<?php

namespace App\Http\Controllers\Components\Table;

use App\Models\Activity;
use Livewire\Component;

class TableAgenda extends Component
{
    public $mode;
    public $redir;

    public function mount($mode, $redir = null){
        $this->mode = $mode;
        if($redir != null){$this->redir = $redir;}
    }

    public function render()
    {
        if($this->mode == 'personal'){
            $agendas = Activity::with('galleries')->where('user_id', auth()->user()->id)->get();
        }else{
            $agendas = Activity::with('galleries')->get();
        }

        return view('components.table.table-agenda', compact('agendas'));
    }
}
