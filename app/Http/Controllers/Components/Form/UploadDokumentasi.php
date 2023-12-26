<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Illuminate\Http\Request;
use Livewire\Component;

class UploadDokumentasi extends Component
{
    public $savedId;
    public $activity;
    public $nomorSurat;

    public function mount($savedId){
        $this->savedId = $savedId;
    }

    public function render()
    {
        return view('components.form.upload-dokumentasi');
    }

    public function doUpload(Request $request){
        $image = $request->file('file');
        $imageName = md5(time().rand(1,100)).".".$image->extension();
        $image->move(public_path('temp-dokumentasi/'.$this->savedId), $imageName);
        return response()->json(['success' => $this->savedId]);
    }

    #[\Livewire\Attributes\On('show-form-upload-dokumentasi')]
    public function setSavedId($savedId){
        $this->savedId = $savedId;
        $this->activity = Activity::find($this->savedId);
        $this->nomorSurat = $this->activity->nomor_surat;
        // dd($this->nomorSurat);
        // dd($this->activity);
    }

    #[\Livewire\Attributes\On('hapus-foto')]
    public function hapusFoto($namaFile){
        // dd("fdasdfas");
    }
}
