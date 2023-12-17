<?php

namespace App\Http\Controllers\Components\Form;

use Livewire\Component;

class InputAgendaKegiatan extends Component
{
    public $searchForm = false;

    public function render()
    {
        return view('components.form.input-agenda-kegiatan');
    }

    public function toggleSearch(){
        $this->searchForm = !$this->searchForm;
    }
}
