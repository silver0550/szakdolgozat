<?php

namespace App\Http\Livewire\Modals\UserInfo;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Models\UserProperty;

class UserInfo extends ModalComponent
{
    public User $user;
    public UserProperty $property;
    public $avatar_path;

    public $label;
    public $readonly;

// userProperty ellenőrzése

    protected $listeners = [
        'avatarUploaded',
    ];

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email'],
        'property.isleader' => ['nullable'],
        'property.department' => ['required'],
        'property.place_of_birth' => ['required'],
        'property.date_of_birth' => ['required'],
        'property.entry_card' => ['required','digits:6'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
        'property.department' => 'A részleg kitöltése kötelező!',
        'property.place_of_birth.required' => 'A születési hely mező kitöltése köptelező!',
        'property.date_of_birth' => 'A születési idő mező kitöltése kötelező!',
        'property.entry_card.required' => 'A belépő kártya számát kötelező megadni!',
        'property.entry_card.digits' => 'Hibás formátum, adjon meg 6 számjegyű számot',
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->label = $user->name;

        $this->property = $user->property()->first();
        $this->readonly = !auth()->user()->can('update', $user);
        
    }

    public function avatarUploaded($avatar_path){
        
        $this->avatar_path = $avatar_path;
    }

    public function update(){                            /* Crashes if entry card is not unique */
     
        $this->validate();

        $this->user->avatar_path = $this->avatar_path;

        $this->emit('update', $this->user, $this->property);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.user-info.user-info');
    }


    // MODAL CONTROL

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
