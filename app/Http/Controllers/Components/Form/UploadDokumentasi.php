<?php

namespace App\Http\Controllers\Components\Form;

use Livewire\Component;

class UploadDokumentasi extends Component
{
    public $savedId;

    public function mount($savedId){
        $this->savedId = $savedId;
    }

    public function render()
    {
        return view('components.form.upload-dokumentasi');
    }
}
