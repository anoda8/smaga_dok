<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Livewire\Component;

class ManajemenGambar extends Component
{
    public $activityId;
    public $activity;

    public function mount($activityId){
        $this->activityId = $activityId;
    }

    public function render()
    {
        $this->activity = Activity::with('galleries')->find($this->activityId);
        return view('components.form.manajemen-gambar');
    }
}
