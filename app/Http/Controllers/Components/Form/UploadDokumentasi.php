<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Activity;
use Illuminate\Http\Request;
use Livewire\Component;

class UploadDokumentasi extends Component
{
    public $savedId;
    public $activity;
    public $showPublikasi = true;
    public $fotoSampul;

    public function mount($savedId){
        $this->savedId = $savedId;
        $this->activity = Activity::find($this->savedId);
    }

    public function render()
    {
        return view('components.form.upload-dokumentasi');
    }

    public function doUpload(Request $request){
        $image = $request->file('file');
        $imageName = md5(time().rand(1,100)).".".$image->extension();
        $image->move(public_path('temp-dokumentasi/'.$request->folder."/"), $imageName);
        return response()->json(['success' => $imageName]);
    }

    #[\Livewire\Attributes\On('hapus-foto')]
    public function hapusFoto($namaFile){
        if(file_exists(public_path('temp-dokumentasi/'.$this->activity->uuid."/".$namaFile))){
            unlink(public_path('temp-dokumentasi/'.$this->activity->uuid."/".$namaFile));
        }else{
            $this->dispatch('show-alert', [
                'icon' => 'error', 'message' => "File yang dihapus tidak ditemukan."
            ]);
        }
    }

    #[\Livewire\Attributes\On('foto-sampul-dipilih')]
    public function tetapkanFotoSampul($fotoFile){
        $this->fotoSampul = $fotoFile;
        $this->dispatch('show-alert', [
            'icon' => 'success', 'message' => "Foto sampul dipilih."
        ]);
    }

    public function lanjutPublikasi(){
        if($this->fotoSampul == null){
            $this->dispatch('show-alert', [
                'icon' => 'error', 'message' => "Pilih foto sampul terlebih dahulu."
            ]);
            return;
        }else{
            $this->dispatch('simpan-dokumentasi', ['publikasi' => true]);
        }
    }

    #[\Livewire\Attributes\On('lanjut-publikasi')]
    public function redirectPublikasi(){
        return $this->redirect('/admin/publikasi/'.$this->activity->id, navigate:true);
    }

    public function simpanDokumentasi(){
        $this->dispatch('simpan-dokumentasi');
    }

    public function togglePublikasi(){
        $this->dispatch('reload-file-list');
        $this->showPublikasi = !$this->showPublikasi;
    }
}
