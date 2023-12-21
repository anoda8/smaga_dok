<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;


class InputAgendaKegiatan extends Component
{

    public $jenisSurat, $nomorSurat, $perihal;
    public $hyperlink;
    public $savedId;

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
}
