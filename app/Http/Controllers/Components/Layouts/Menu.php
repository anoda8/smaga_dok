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
                'icon' => "bi-grid",
                'text' => "Dashboard"
            ],
            [
                'name' => 'agenda',
                'link' => "",
                'icon' => "bx-notepad",
                'text' => "Agenda Kegiatan"
            ]
        ];
    }
}
