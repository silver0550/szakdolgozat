<?php

namespace App\Services;

class sidebarService
{
    public $menu = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home', 'function' => 'selfPage'],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit', 'function' => 'dashBoard'],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'function' => 'search'],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'function' => 'logout'],
    ];

    public $admin = [
        'name' => 'Dashboard', 'icon' => 'icon-home', 'function' => 'dashBoard'
    ];

    public static function newSidebar(): self
    {
        return new sidebarService;
    }

    public function checkAdmin(): self
    {

        if (auth()->user()->isadmin) {array_unshift($this->menu,$this->admin);}
        return $this;
        
    }
}