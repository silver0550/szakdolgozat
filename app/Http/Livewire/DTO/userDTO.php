<?php

namespace App\Http\Livewire\DTO;

use Livewire\Wireable;

class UserDTO implements Wireable
{
    public $assignments = [];
    
    public function __construct()
    {
        $this->assignments = [
            'Fejlesztő',
            'Tesztelő',
            'Project Manager',
            'csak egy teszt'
        ];
    }

    public function toLivewire()
    {
        return $this->assignments;
    }

    public static function fromLivewire($value)
    {
        return new static($value);
    }
}