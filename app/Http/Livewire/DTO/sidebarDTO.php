<?php

namespace App\Http\Livewire\DTO;

use Livewire\Wireable;

class sidebarDTO implements Wireable
{

    public $options = [
        ['name' => 'Saját adatok', 'icon' => 'icon-home', 'page' => 'selfpage'],
        ['name' => 'Kimutatás', 'icon' => 'icon-home', 'page' =>'selfpage'],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'page' =>'search',
         'sub' =>[
            [
            'name' => 'subPage',
            'page' => ''
            ]
         ]],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'page' =>'logout'],
    ];

    protected $dashboard = [
        'name' => 'Dashboard', 'icon' => 'icon-home', 'page' => 'dashboard',
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
            [
            'name' => 'Felhasználók',
            'page' =>'',
            ],
        ]
    ];

    public function __construct()
    {
        //
    }

    public static function get(): self
    {
        return new sidebarDTO;
    }

    public function asAdmin(): self
    {

        array_unshift($this->options,$this->dashboard);

        return $this;
    }

    public function toLivewire()
    {
        return $this->options;
    }

    public static function fromLivewire($value){
        
        return new static ($value);
    }
}