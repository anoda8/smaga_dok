<?php

namespace App\Http\Controllers\Pages\Admin;

use Livewire\Component;

class AgendaPersonal extends Component
{
    public $mode;

    public function mount(){
        $this->mode = 'personal';
    }

    public function render()
    {
        return view('pages.admin.agenda-personal');
    }
}
