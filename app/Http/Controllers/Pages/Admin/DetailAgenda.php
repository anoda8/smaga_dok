<?php

namespace App\Http\Controllers\Pages\Admin;

use Livewire\Component;

class DetailAgenda extends Component
{
    public $activityId;
    public $redir;

    public function mount($activityId, $redir = null){
        $this->activityId = $activityId;
        if($redir != null){$this->redir = $redir;}
    }

    public function render()
    {
        return view('pages.admin.detail-agenda');
    }

    #[\Livewire\Attributes\On('agenda-kegiatan-terhapus')]
    public function redirectBack(){
        $this->redirect('/admin/'.$this->redir);
    }
}
