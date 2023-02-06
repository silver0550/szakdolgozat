<?php

namespace App\Services;

use App\Enums\sidebarEnum;

class sidebarService
{

    public $menu = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home', 'function' => sidebarEnum::SELF],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit', 'function' => sidebarEnum::SELF],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'function' => sidebarEnum::SEARCH],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'function' => sidebarEnum::LOGOUT],
    ];

    public $admin = [
        'name' => 'Dashboard', 'icon' => 'icon-home', 'function' => sidebarEnum::DASHBOARD
    ];

    public static function newSidebar(): self
    {
        return new sidebarService;
    }

    public function withAdmin(): self
    {
        
        array_unshift($this->menu,$this->admin);

        return $this;
        
    }


}