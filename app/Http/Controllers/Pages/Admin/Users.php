<?php

namespace App\Http\Controllers\Pages\Admin;

use Livewire\Component;

class Users extends Component
{
    public $level;

    public function mount($level){
        $this->level = $level;
    }

    public function render()
    {
        return view('pages.admin.users');
    }
}
