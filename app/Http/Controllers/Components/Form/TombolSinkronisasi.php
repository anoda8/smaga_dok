<?php

namespace App\Http\Controllers\Components\Form;

use App\Models\Connection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TombolSinkronisasi extends Component
{
    public $level;
    public $color;

    public function mount($level){
        $this->level = $level;
        switch ($this->level) {
            case 'admin':
                $this->color = 'success';
                break;
            case 'guru':
                $this->color = 'warning';
                break;
            default:
                $this->color = 'info';
                break;
        }
    }

    public function render()
    {
        return view('components.form.tombol-sinkronisasi');
    }

    public function sync(){
        switch ($this->level) {
            case 'admin':
                $this->syncAdministrator();
                break;
            case 'guru':
                $this->syncGuru();
                break;
            default:
                $this->syncSiswa();
                break;
        }
    }

    private function syncAdministrator(){
        $settingDapo    = Connection::get()->first();
        $getDataPtk     = Http::acceptJson()->withToken($settingDapo->key)->get('http://'.$settingDapo->ip_dapodik.':5774/WebService/getGtk?npsn='.$settingDapo->npsn);
        $collection     = json_decode($getDataPtk);
        // dd($collection);
        foreach ($collection->rows as $row) {
            if(User::where('username', $row->nik)->exists()){continue;}
            if (!str_contains($row->jenis_ptk_id_str, "Guru") != null) {
                $passwd = explode("-", $row->tanggal_lahir);
                $user = User::updateOrCreate(['import_id' => $row->ptk_id], [
                    'name' => $row->nama,
                    'username' => $row->nik,
                    'password' => Hash::make($passwd[2] . $passwd[1] . $passwd[0]),
                ]);
                if ($user->wasRecentlyCreated) {
                    $user->addRole('admin');
                }
            }
        }

        $this->dispatch('refreshComponent');
    }

    private function syncGuru(){
        $settingDapo    = Connection::get()->first();
        $getDataPtk     = Http::acceptJson()->withToken($settingDapo->key)->get('http://'.$settingDapo->ip_dapodik.':5774/WebService/getGtk?npsn='.$settingDapo->npsn);
        $collection     = json_decode($getDataPtk);
        // dd($collection);
        foreach ($collection->rows as $row) {
            if(User::where('username', $row->nik)->exists()){continue;}
            if (str_contains($row->jenis_ptk_id_str, "Guru") != null) {
                $passwd = explode("-", $row->tanggal_lahir);
                $user = User::updateOrCreate(['import_id' => $row->ptk_id], [
                    'name' => $row->nama,
                    'username' => $row->nik,
                    'password' => Hash::make($passwd[2] . $passwd[1] . $passwd[0]),
                ]);
                if ($user->wasRecentlyCreated) {
                    $user->addRole('guru');
                }
            }
        }

        $this->dispatch('refreshComponent');
    }

    private function syncSiswa(){
        $settingDapo    = Connection::get()->first();
        $getDataPtk     = Http::acceptJson()->withToken($settingDapo->key)->get('http://'.$settingDapo->ip_dapodik.':5774/WebService/getPesertaDidik?npsn='.$settingDapo->npsn);
        $collection     = json_decode($getDataPtk);
        // dd($collection);
        foreach ($collection->rows as $row) {
            if(User::where('username', $row->nipd)->orWhere('username', $row->nisn)->exists()){continue;}
            $passwd = explode("-", $row->tanggal_lahir);
            $user = User::updateOrCreate(['import_id' => $row->peserta_didik_id], [
                'name' => $row->nama,
                'username' => $row->nipd == null ? $row->nisn : $row->nipd,
                'password' => Hash::make($passwd[2] . $passwd[1] . $passwd[0]),
            ]);
            if ($user->wasRecentlyCreated) {
                $user->addRole('siswa');
            }
        }

        $this->dispatch('refreshComponent');
    }
}
