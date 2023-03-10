<?php

namespace App\Http\Livewire\Modals;


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

    public $languageBuilder = [
        'language' => '',
        'level' => '',
    ];

    public $language_knowledge;

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email','unique:users,email'],
        'property.place_of_birth' => ['required'],
        'property.date_of_birth' => ['required'],
        'avatar' => ['image','nullable'],
        'property.entry_card' => ['required','digits:6','unique:user_properties,entry_card'],
        'property.language_knowledge' => ['nullable'],
        'property.department' => ['required','not_in:Válasszon'],
        'property.isleader'=> ['nullable'],
        
        
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.email.unique' => 'Az e-mail cím már használatban van!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
        'property.place_of_birth' => 'A születési hely mező kitöltése kötelező!',
        'property.date_of_birth' => 'A születési idő mező kitöltése kötelező!',
        'property.entry_card.required' => 'A belépő kártya számát kötelező megadni!',
        'property.entry_card.digits' => 'Hibás formátum, adjon meg 6 számjegyű számot',
        'property.entry_card.unique' => 'A belépőkártya szám már használatban van!',
        // 'property.language_knowledge' => ,
        'property.department' => 'A részleg kitöltése kötelező!',
        'avatar' => 'Csak kép formátum engedélyezett!',
        'languageBuilder.*' => 'A nyelv és a szint kiválasztása is kötelező!',
    ];

    public function mount(){
        $this->user = new User;
        $this->property = new UserProperty;
    }

    public function save(){
        $this->validate();

        if ($this->avatar){
            $this->user->avatar_path = $this->avatar->store('avatars','public');
        }
        $this->property->language_knowledge = json_encode($this->language_knowledge);
        $this->emit('create', $this->user, $this->property);

        $this->closeModal();
      
    }

    public function addLanguage(){
        $this->validate([
            'languageBuilder.language' => ['required','not_in:Válasszon'],
            'languageBuilder.level' => ['required','not_in:Válasszon'],
        ]);

        $language_knowledge = [
            $this->languageBuilder['language'] => $this->languageBuilder['level']
        ];

        if ($this->language_knowledge){
            $this->language_knowledge = array_merge($this->language_knowledge, $language_knowledge);
        }
        else {$this->language_knowledge = $language_knowledge;}

        $this->reset('languageBuilder');

    }

    public function removeLanguage($language){
        unset($this->language_knowledge[$language]);
    }

    public function render()
    {
        return view('livewire.modals.new-user-form');
    }

    public function updatedAvatar(){
        $this->validate([
            'avatar' => ['image','nullable'],
        ]);
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
