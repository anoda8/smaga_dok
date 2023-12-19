<?php

namespace App\Http\Controllers\Components\Table;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $perpage = 10;
    public $level;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($level){
        $this->level = $level;
    }

    public function render()
    {
        $users = User::whereHasRole($this->level)->paginate($this->perpage);
        return view('components.table.users', compact('users'));
    }

    public function hapus($hapusId){
        $user = User::find($hapusId);
        if($user){
            $user->delete();
        }
        $this->dispatch('show-alert', [
            'icon' => 'success', 'message' => "User Terhapus."
        ]);
    }

}
