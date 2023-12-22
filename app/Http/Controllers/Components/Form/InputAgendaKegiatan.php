<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use App\Models\Contributor;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;


class InputAgendaKegiatan extends Component
{

    public $jenisSurat, $nomorSurat, $perihal;
    public $hyperlink;
    public $savedId;
    public $showDokumentasiForm = false;
    public $showPublikasiForm = false;
    public $showDetailKegiatanForm = true;

    #[Validate('required')]
    public $namaKegiatan, $startDate, $endDate;

    public function render()
    {
        return view('components.form.input-agenda-kegiatan');
    }

    #[\Livewire\Attributes\On('kirim-surat-terpilih')]
    public function getSuratPilihan($data){
        $this->jenisSurat = $data['jenisSurat'];
        $this->nomorSurat = $data['nomorSurat'];
        $this->perihal = $data['perihal'];
        $this->namaKegiatan = $data['perihal'];
        $this->hyperlink = $data['hyperlink'];
    }

    public function updatedStartDate($value){
        $this->endDate = $value;
    }

    public function simpan(){
        $this->validate();
        $savedActivity = null;
        if($this->savedId == null){
            $savedActivity = Activity::create([
                "user_id" => auth()->user()->id,
                "start_date" => $this->startDate,
                "end_date" => $this->endDate,
                "activity" => $this->namaKegiatan,
                "jenis_surat" => $this->jenisSurat,
                "nomor_surat" => $this->nomorSurat,
                "hyperlink_surat" => $this->hyperlink,
            ]);
        }else{
            $savedActivity = Activity::find($this->savedId);
            $updateSavedActivity = $savedActivity;
            $updateSavedActivity->update([
                "start_date" => $this->startDate,
                "end_date" => $this->endDate,
                "activity" => $this->namaKegiatan,
            ]);
        }

        if($savedActivity){
            $this->savedId = $savedActivity->id;
            $this->dispatch('agenda-kegiatan-tersimpan', savedId: $this->savedId);
            $savedContributor = $this->saveContributor();
            if($savedContributor === true){
                $this->dispatch('show-alert', [
                    'icon' => 'success', 'message' => "Kegiatan tersimpan."
                ]);
            }else{
                $this->dispatch('show-alert', [
                    'icon' => 'warning', 'message' => $this->saveContributor()." tidak ditemukan dalam data user."
                ]);
            }

        }
    }

    public function saveContributor(){
        $getKontributor = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_api_url').'/disposisi/', [
            'tahun_agenda' => $this->nomorSurat,
        ]);
        $dataKontributor = $getKontributor['data'];
        $emptyUser = "";
        foreach($dataKontributor as $kontributor){
            $getUser = User::where('username', $kontributor['user']['username']);
            // dd($getUser->exists());
            if($getUser->exists()){
                Contributor::updateOrCreate([
                    'activity_id' => $this->savedId,
                    'user_id' => $getUser->get()->id,
                ]);
            }else{
                $emptyUser .= $kontributor['user']['name'].", ";
            }
        }
        // dd($emptyUser);
        return $emptyUser == "" ? true : $emptyUser;
    }

    #[\Livewire\Attributes\On('hapus-agenda-kegiatan')]
    public function hapus(){
        //cek dulu apakah ada gambar yang tertinggal atau post yang sudah dibuat
        if($this->savedId != null){
            Activity::find($this->savedId)->delete();
            $this->dispatch('show-alert', [
                'icon' => 'success', 'message' => "Berhasil menghapus agenda kegiatan."
            ]);
            $this->reset();
        }
    }

    public function toggleDetailKegiatan(){
        $this->showDetailKegiatanForm = !$this->showDetailKegiatanForm;
    }

    public function toggleDokumentasi(){
        $this->showDokumentasiForm = !$this->showDokumentasiForm;
    }
}
