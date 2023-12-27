<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Models\Activity;
use Livewire\Component;

class Dokumentasi extends Component
{
    public $activityId;

    public function mount($activityId){
        $this->activityId = $activityId;
    }

    public function render()
    {
        return view('pages.admin.dokumentasi');
    }
}
