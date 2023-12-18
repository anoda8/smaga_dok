<?php

namespace App\Http\Controllers\Components\Form;

use Livewire\Component;

class TombolSinkronisasi extends Component
{
    public $level;
    public $color;

    public function mount($level){
        $this->level = $level;
        switch ($this->level) {
            case 'admin':
                $this->color = 'success';
                break;
            case 'guru':
                $this->color = 'warning';
                break;
            default:
                $this->color = 'info';
                break;
        }
    }

    public function render()
    {
        return view('components.form.tombol-sinkronisasi');
    }
}
