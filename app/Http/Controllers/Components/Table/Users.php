<?php

namespace App\Http\Controllers\Components\Table;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $level;

    public function mount($level){
        $this->level = $level;
    }

    public function render()
    {
        $users = User::whereHasRole($this->level)->get();
        return view('components.table.users', compact('users'));
    }
}
