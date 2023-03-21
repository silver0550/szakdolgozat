<?php

namespace App\Http\Livewire\Modals\NewUserForm;


use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Models\UserProperty;
use Livewire\WithFileUploads;

class NewUserForm extends ModalComponent
{
    use WithFileUploads;

    public User $user;
    public UserProperty $property;

    public $avatar;
    public $language_knowledge;

    protected $rules =[
        'user.name' => ['required'], 
        'user.email' => ['required','email','unique:users,email'],
        'property.place_of_birth' => ['required'],
        'property.date_of_birth' => ['required'],
        'property.entry_card' => ['required','digits:6','unique:user_properties,entry_card'],
        'property.department' => ['required','not_in:Válasszon'],
        'property.isleader'=> ['nullable'],
        
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.email.unique' => 'Az e-mail cím már használatban van!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
        'property.place_of_birth.required' => 'A születési hely mező kitöltése kötelező!',
        'property.date_of_birth' => 'A születési idő mező kitöltése kötelező!',
        'property.entry_card.required' => 'A belépő kártya számát kötelező megadni!',
        'property.entry_card.digits' => 'Hibás formátum, adjon meg 6 számjegyű számot',
        'property.entry_card.unique' => 'A belépőkártya szám már használatban van!',
        'property.department' => 'A részleg kitöltése kötelező!',
    ];

    protected $listeners = [
        'fileUploaded',
        'languageUpdated'
    ];

    public function mount(){
        $this->user = new User;
        $this->property = new UserProperty;
    }

    public function save(){
        $this->validate();

        if($this->avatar){
            $this->user->avatar_path = $this->avatar;
        }

        $this->property->language_knowledge = json_encode($this->language_knowledge);
        $this->emit('create', $this->user, $this->property);
        $this->closeModal();
      
    }

    public function render()
    {
        return view('livewire.modals.new-user-form.new-user-form');
    }

    public function fileUploaded($filePath){

        $this->avatar = $filePath;
    
    }

    public function languageUpdated($languages){

        $this->language_knowledge = $languages;

    }

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
