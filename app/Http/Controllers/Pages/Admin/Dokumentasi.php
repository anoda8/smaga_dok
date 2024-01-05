<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Models\Activity;
use Livewire\Component;

class Dokumentasi extends Component
{
    public $activityId;
    public $redir;

    public function mount($activityId, $redir = null){
        $this->activityId = $activityId;
        if($redir != null){$this->redir = $redir;}
    }

    public function render()
    {
        return view('pages.admin.dokumentasi');
    }
}
