<?php

namespace App\Http\Controllers\Components\Table;

use Livewire\Component;

class Users extends Component
{
    public $level;

    public function mount($level){
        $this->level = $level;
    }

    public function render()
    {
        return view('components.table.users');
    }
}
