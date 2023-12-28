<?php

namespace App\Http\Controllers\Components\Table;

use App\Models\Activity;
use Livewire\Component;

class AgendaPublik extends Component
{
    public $mode;

    public function mount($mode){
        $this->mode = $mode;
    }

    public function render()
    {
        if($this->mode == 'personal'){
            $agendas = Activity::where('user_id', auth()->user()->id)->get();
        }else{
            $agendas = Activity::all();
        }

        return view('components.table.agenda-publik', compact('agendas'));
    }
}
