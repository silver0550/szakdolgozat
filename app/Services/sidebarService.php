<?php

namespace App\Services;

use App\Enums\sidebarEnum;

class sidebarService
{

    // menu structure 

    public $menu = [
        ['name' => sidebarEnum::NAME_SELF, 'icon' => sidebarEnum::ICON_HOME, 'page' => sidebarEnum::PAGE_SELF],
        ['name' => sidebarEnum::NAME_STATEMENT, 'icon' => sidebarEnum::ICON_EXIT, 'page' => sidebarEnum::PAGE_SELF],
        ['name' => sidebarEnum::NAME_SEARCH,'icon' => sidebarEnum::ICON_SEARCH, 'page' => sidebarEnum::PAGE_SEARCH, 'sub' => [['name' => 'teszt sub', 'page' => '']]],
        ['name' => sidebarEnum::NAME_STAT, 'icon' => sidebarEnum::ICON_HOME, 'page' => sidebarEnum::PAGE_SELF],
        ['name' => sidebarEnum::NAME_EXIT, 'icon' => sidebarEnum::ICON_EXIT, 'page' => sidebarEnum::PAGE_LOGOUT],
    ];

    public $dashboard = 
        ['name' => sidebarEnum::NAME_DASHBOARD, 'icon' => sidebarEnum::ICON_HOME, 'page' => 'dashboard',
        'sub' => [
            [
            'name' => 'Alkalmazott felvétel',
            'page' => 'addUser'
            ],
            [
            'name' => 'Eszköz felvétel',
            'page' => 'addItem'
            ],
            [
            'name' => 'Eszköz kiosztása',
            'page' => 'useItem'
            ],
        ],
    ];

    public function __construct()
    {
        $this->menu = collect($this->menu)->map(fn($i) => collect($i));
    }

    public static function newSidebar(): self
    {
        return new sidebarService;
    }


    public function withAdmin(): self
    {
        
        $this->menu = collect([$this->dashboard])->merge($this->menu);
        

        return $this;
        
    }


}