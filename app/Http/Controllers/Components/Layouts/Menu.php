<?php

namespace App\Http\Controllers\Components\Layouts;

use Livewire\Component;

class Menu extends Component
{
    public $menuLevel;
    public $generatedMenu;

    public function mount(){
        $userAuth = auth()->user();
        if($userAuth->hasRole('super')){
            $this->generatedMenu = $this->menuSuper();
        }
    }

    public function render()
    {
        return view('components.layouts.menu');
    }

    public function menuSuper(){
        return [
            [
                'name' => 'dashboard',
                'link' => "",
                'icon' => "bx-grid",
                'text' => "Dashboard",
                'children' => false,
            ],
            [
                'name' => 'agenda',
                'link' => route('admin.agenda-kegiatan'),
                'icon' => "bx-notepad",
                'text' => "Agenda Kegiatan",
                'children' => false,
            ],
            [
                'name' => 'user',
                'link' => '#',
                'icon' => "bxs-user-account",
                'text' => "Users",
                'children' => [
                    [
                        'name' => 'admin',
                        'link' => "/admin/users/admin",
                        'icon' => "bxs-user",
                        'text' => "Administrator",
                    ],
                    [
                        'name' => 'guru',
                        'link' => "/admin/users/guru",
                        'icon' => "bxs-user",
                        'text' => "Guru",
                    ],
                    [
                        'name' => 'siswa',
                        'link' => "/admin/users/siswa",
                        'icon' => "bxs-user",
                        'text' => "Siswa",
                    ],
                ],
            ],
            [
                'name' => 'pengaturan',
                'link' => '#',
                'icon' => "bxs-cog",
                'text' => "Pengaturan",
                'children' => [
                    [
                        'name' => 'dapodik',
                        'link' => route('admin.koneksi-dapodik'),
                        'icon' => "bxs-wire",
                        'text' => "Koneksi Dapodik",
                    ],
                ],
            ],
        ];
    }
}
