<?php

namespace App\Http\Controllers\Components\Form;

use Livewire\Component;

class AturFotoDokumentasi extends Component
{
    public $uuid;
    public $listFoto = [];
    public $fotoSampul;
    public $fotoTerpilih;

    public function mount($uuid){
        $this->uuid = $uuid;
    }

    #[\Livewire\Attributes\On('reload-file-list')]
    public function render()
    {
        $fileList = scandir(public_path('temp-dokumentasi/'.$this->uuid));
        $this->listFoto = $fileList;
        return view('components.form.atur-foto-dokumentasi', compact('fileList'));
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
