<?php

namespace App\Http\Controllers\Components\Form;

use Livewire\Component;

class ManajemenGambar extends Component
{
    public $activityId;

    public function mount($activityId){
        $this->activityId = $activityId;
    }

    public function render()
    {
        return view('components.form.manajemen-gambar');
    }
}
