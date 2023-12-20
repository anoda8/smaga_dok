<?php

namespace App\Http\Controllers\Components\Form;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;


class InputAgendaKegiatan extends Component
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
        return view('components.form.input-agenda-kegiatan');
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

    #[On('surat-terpilih')]
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
            $result = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_url').'/cari-surat-masuk/perihal', [
                'perihal' => $this->perihal
            ]);
            $arrRes = json_decode($result);
            if(count($arrRes->data) > 0){
                $this->searchForm = false;
                $this->suratMasukFound = $arrRes->data;
            }
        }else{
            if($this->nomor_surat != null){
                $result = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_url').'/cari-surat-masuk/nomor-agenda', [
                    'nomor_agenda' => $this->nomor_surat,
                    'tahun' => $this->tahun
                ]);
                $arrRes = json_decode($result);
                if(count($arrRes->data) > 0){
                    $this->searchForm = false;
                    $this->suratMasukFound = $arrRes->data;
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
        $suratMasuk = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_url').'/pilih-surat-masuk/'.$id, [
            'nomor_agenda' => $this->nomor_surat,
            'tahun' => $this->tahun
        ]);

        $result = json_decode($suratMasuk);
        dd($result);
    }
}
