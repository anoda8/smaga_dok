<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Publikasi extends Component
{
    public $activityId;
    public $activity;

    #[Validate('required')]
    public $title, $content;

    public function mount($activityId)
    {
        $this->activityId = $activityId;
        if($activityId != null){
            $this->activity = Activity::find($activityId);
            $this->title = $this->activity->activity;
        }
    }

    public function render()
    {
        return view('components.form.publikasi');
    }
}
