<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;


class InputAgendaKegiatan extends Component
{
    public $jenisSurat, $nomorSurat, $perihal;

    public function render()
    {
        return view('components.form.input-agenda-kegiatan');
    }

    #[\Livewire\Attributes\On('kirim-surat-terpilih')]
    public function getSuratPilihan($data){
        dd($data);
    }
}
