<?php

namespace App\Http\Controllers\Pages\Admin;

use Livewire\Component;

class LaporanPage extends Component
{
    public $activityId;

    public function mount($activityId){
        $this->activityId = $activityId;
    }

    public function render()
    {
        return view('pages.admin.laporan-page');
    }
}
