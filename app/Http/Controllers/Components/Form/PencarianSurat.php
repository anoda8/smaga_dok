<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PencarianSurat extends Component
{
    public $searchForm = false;
    public $tahun;
    public $nomor_surat, $jenisSurat, $perihal;

    public $suratMasukFound, $suratMasukTerpilih;
    public $suratKeluarFound, $suratKeluarTerpilih;
    public $suratTugasFound, $suratTugasTerpilih;

    public function mount(){
        $this->tahun = date("Y");
        $this->jenisSurat = "masuk";
    }

    public function render()
    {
        return view('components.form.pencarian-surat');
    }

    public function toggleSearch(){
        $this->searchForm = !$this->searchForm;
    }

    public function search(){
        switch ($this->jenisSurat) {
            case 'masuk':
                $this->searchSuratMasuk();
                break;
            case 'keluar':
                $this->searchSuratKeluar();
                break;
            case 'tugas':
                $this->searchSuratTugas();
                break;
            default:
                # code...
                break;
        }
    }

    public function konfirmasiPilih($id){
        $this->dispatch('konfirmasi-pilih', ['id' => $id]);
    }

    #[\Livewire\Attributes\On('surat-terpilih')]
    public function pilih($suratId){
        switch ($this->jenisSurat) {
            case 'masuk':
                $this->pilihSuratMasuk($suratId);
                break;
            case 'keluar':
                # code...
                break;
            case 'tugas':
                # code...
                break;
            default:
                # code...
                break;
        }
    }

    public function searchSuratMasuk(){
        if($this->perihal != null){
            $result = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_api_url').'/cari-surat-masuk/perihal', [
                'perihal' => $this->perihal
            ]);
            $arrRes = json_decode($result);
            if(count($arrRes->data) > 0){
                $this->searchForm = false;
                $this->suratMasukFound = $arrRes->data;
                $this->dispatch('show-alert', [
                    'icon' => 'success', 'message' => "Ditemukan ".count($arrRes->data)." surat masuk."
                ]);
            }else{
                $this->dispatch('show-alert', [
                    'icon' => 'error', 'message' => "Tidak ditemukan."
                ]);
            }
        }else{
            if($this->nomor_surat != null){
                $result = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_api_url').'/cari-surat-masuk/nomor-agenda', [
                    'nomor_agenda' => $this->nomor_surat,
                    'tahun' => $this->tahun
                ]);
                $arrRes = json_decode($result);
                if(count($arrRes->data) > 0){
                    $this->searchForm = false;
                    $this->suratMasukFound = $arrRes->data;
                    $this->dispatch('show-alert', [
                        'icon' => 'success', 'message' => "Ditemukan 1 surat masuk."
                    ]);
                }else{
                    $this->dispatch('show-alert', [
                        'icon' => 'error', 'message' => "Tidak ditemukan."
                    ]);
                }
            }
        }
        $this->perihal = null;
        $this->nomor_surat = null;
    }

    public function searchSuratKeluar(){

    }

    public function searchSuratTugas(){

    }

    public function pilihSuratMasuk($id){
        $suratMasuk = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_api_url').'/pilih-surat-masuk/'.$id, [
            'nomor_agenda' => $this->nomor_surat,
            'tahun' => $this->tahun
        ]);

        $result = json_decode($suratMasuk);
        $surat = $result->data;

        $cek = Activity::where('jenis_surat', $this->jenisSurat)
        ->where('nomor_surat',$surat->nomor_agenda)
        ->where('tahun_surat',$surat->tahun)->exists();

        if($cek){
            $this->dispatch('show-alert', [
                'icon' => 'error', 'message' => "Sudah ada agenda kegiatan."
            ]);
        }else{
            $data = [
                'jenisSurat' => $this->jenisSurat,
                'nomorSurat' => $surat->tahun."-".$surat->nomor_agenda,
                'perihal' => $surat->perihal,
                'hyperlink' => config('app.eletter_url').'/storage/surat-masuk/'.$surat->file->nama_file
            ];

            $this->dispatch('kirim-surat-terpilih', data: $data);
            $this->suratMasukFound = null;
        }
    }
}
