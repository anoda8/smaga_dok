<?php

namespace App\Http\Controllers\Components\Form;

use Illuminate\Http\Request;
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

    public function doUpload(Request $request){
        $image = $request->file('file');
        $imageName = time().rand(1,100).".".$image->extension();
        $image->move(public_path('images'), $imageName);
        return response()->json(['success' => $imageName]);
    }
}
