<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Models\Connection;
use Livewire\Component;
use Livewire\Attributes\Validate;

class KoneksiDapodik extends Component
{
    public $koneksi;

    #[Validate('required')]
    public $ip_app, $ip_dapodik, $key, $npsn;

    public function mount(){
        $this->koneksi = Connection::get()->first();
        if($this->koneksi == null){
            $this->generateConnection();
        }

        $this->ip_app = $this->koneksi->ip_app;
        $this->ip_dapodik = $this->koneksi->ip_dapodik;
        $this->key = $this->koneksi->key;
        $this->npsn = $this->koneksi->npsn;
    }

    public function render()
    {
        return view('pages.admin.koneksi-dapodik', ['koneksi' => $this->koneksi]);
    }

    public function simpan(){
        $this->validate();

        // $koneksi = Connection::where('id', $this->koneksi->id)
        $this->koneksi->update([
            'ip_app' => $this->ip_app,
            'ip_dapodik' => $this->ip_dapodik,
            'key' => $this->key,
            'npsn' => $this->npsn
        ]);

        $this->dispatch('show-alert', [
            'icon' => 'success', 'message' => "Koneksi dapodik tersimpan."
        ]);
    }

    public function generateConnection(){
        Connection::create([
            'ip_app' => config('app.dapodik_ip'),
            'ip_dapodik' => config('app.dapodik_ip_aplikasi'),
            'key' => config('app.dapodik_key'),
            'npsn' => config('app.dapodik_npsn'),
        ]);
    }
}
