<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use App\Models\GalleryFile;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Publikasi extends Component
{
    public $activityId;
    public $activity;
    public $fotoSampul;

    #[Validate('required')]
    public $title, $content;

    public function mount($activityId)
    {
        $this->activityId = $activityId;
        if($activityId != null){
            $this->activity = Activity::find($activityId);
            $this->title = $this->activity->activity;
            $this->fotoSampul = GalleryFile::where('activity_id', $this->activity->id)
            ->where('sampul', 1)->get()->first();
        }
    }

    public function render()
    {
        return view('components.form.publikasi');
    }

    public function simpan(){
        // $this->validate();
        dd($this->content);
        Post::updateOrCreate([
            'activity_id' => $this->activity->id
        ], [
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => $this->createSlug(),
            'content' => $this->content,
            'main_photo_url' => $this->fotoSampul
        ]);

        $this->dispatch('show-alert', [
            'icon' => 'success', 'message' => "Publikasi tersimpan."
        ]);
    }

    public function createSlug(){
        $filter = str_replace(' ', '-', $this->title);
        return $filter;
    }
}
