<?php

namespace App\Http\Controllers\Pages\Admin;

use Livewire\Component;

class AgendaPublik extends Component
{
    public $mode;

    public function mount(){
        $this->mode = 'publik';
    }

    public function render()
    {
        return view('pages.admin.agenda-publik');
    }
}
