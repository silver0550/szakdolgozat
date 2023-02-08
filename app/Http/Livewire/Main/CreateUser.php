<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Http\Livewire\DTO\UserDTO;

class CreateUser extends Component
{

    public userDTO $dto;

    public $userId;
    // public $assignments;


    public function mount(){

        $this->dto = new UserDTO;
    }

    public function render()
    {
        return view('livewire.main.create-user');
    }
}
