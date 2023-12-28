<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\GalleryFile;
use Livewire\Component;

class AturFotoDokumentasi extends Component
{
    public $uuid;
    public $listFoto = [];
    public $fotoSampul;
    public $fotoTerpilih;
    public $activityId;

    public function mount($uuid, $activityId){
        $this->uuid = $uuid;
        $this->activityId = $activityId;
    }

    #[\Livewire\Attributes\On('reload-file-list')]
    public function render()
    {
        $fileList = scandir(public_path('temp-dokumentasi/'.$this->uuid));
        $this->listFoto = $fileList;
        return view('components.form.atur-foto-dokumentasi', compact('fileList'));
    }

    #[\Livewire\Attributes\On('simpan-dokumentasi')]
    public function simpanDokumentasi(){
        $fileList = scandir(public_path('temp-dokumentasi/'.$this->uuid));
        foreach ($fileList as $key => $file) {
            if(strlen($file) > 5){
                GalleryFile::create([
                    'activity_id' => $this->activityId,
                    'photo_url' => $file,
                ]);
            }
        }

        $this->dispatch('show-alert', [
            'icon' => 'success', 'message' => "Foto tersimpan dalam kegiatan."
        ]);
    }

    #[\Livewire\Attributes\On('foto-sampul-dipilih')]
    public function tetapkanFotoSampul($fotoFile){
        $this->fotoSampul = $fotoFile;
    }

    public function previewFoto($fotoFileName){
        $this->fotoTerpilih = $fotoFileName;
    }

    public function hapusFoto(){
        if(file_exists(public_path('temp-dokumentasi/'.$this->uuid.'/'.$this->fotoTerpilih))){
            unlink(public_path('temp-dokumentasi/'.$this->uuid.'/'.$this->fotoTerpilih));
            $this->dispatch('show-alert', [
                'icon' => 'success', 'message' => "Foto terhapus."
            ]);
            $this->dispatch('foto-terhapus');
        }else{
            $this->dispatch('show-alert', [
                'icon' => 'error', 'message' => "Gagal, foto tidak ditemukan."
            ]);
        }
    }
}
