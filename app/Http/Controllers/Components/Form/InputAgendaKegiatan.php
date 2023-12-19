<?php

namespace App\Http\Controllers\Components\Form;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class InputAgendaKegiatan extends Component
{
    public $searchForm = false;
    public $tahun;
    public $nomor_surat, $jenis_surat, $perihal;

    public $suratMasukFound;
    public $suratKeluarFound;
    public $suratTugasFound;

    public function mount(){
        $this->tahun = date("Y");
        $this->jenis_surat = "masuk";
    }

    public function render()
    {
        return view('components.form.input-agenda-kegiatan');
    }

    public function toggleSearch(){
        $this->searchForm = !$this->searchForm;
    }

    public function search(){

        if($this->nomor_surat != null){
            if($this->jenis_surat == 'masuk'){
                $result = Http::acceptJson()->withToken(config('app.eletter_token'))->post(config('app.eletter_url').'/cari-surat-masuk/nomor-agenda', [
                    'nomor_agenda' => $this->nomor_surat,
                    'tahun' => $this->tahun
                ]);

                $arrRes = json_decode($result);

                if(count($arrRes->data) > 0){
                    $this->searchForm = false;
                }
            }
        }

    }
}
