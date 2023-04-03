<?php

namespace App\Http\Livewire\Login;

use App\Models\User;
use App\Models\UserProperty;
use LivewireUI\Modal\ModalComponent;

class PasswordReset extends ModalComponent
{
    

    public $name;
    public $dateOfBirth;
    public $entryCard;


    protected $rules =[
        'name' => ['required'],
        'dateOfBirth' => ['required'],
        'entryCard' => ['required'],
    ];

    protected $messages =[
        'name.required' => "Név mező kitöltése kötelező!",
        'dateOfBirth.required' => 'A születési idő mező kitöltése kötelező!',
        'entryCard.required' => 'A belépő kártya számát kötelező megadni!'
    ];

    public function send(){

        // $this->validate();

        // $isExist = UserProperty::where('date_of_birth', $this->dateOfBirth)
        //                     ->where('entry_card', $this->entryCard)->first();

        // if ($isExist){

        //     $isExist = $isExist->user()->first()->name === $this->name ? $isExist->user()->first() : null; 

        // }
        $isExist = User::find(3);
        $this->emit('forgotPassword', $isExist);
        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.login.password-reset');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public static function closeModalOnClickAway(): bool
    {
            return false;
    }
}
