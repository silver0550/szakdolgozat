<?php

namespace App\Http\Livewire\Modals\UserForm;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;

class UserForm extends Component
{
    public User $user;
    public UserProperty $property;
    
    public $avatar_path = null;
    public $languages = null;

    public $readonly;
    public $target;

    protected $listeners = [
        'avatarUploaded',
        'languageUpdated',
    ];

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email'],
        'property.isleader' => ['nullable'],
        'property.department' => ['required','not_in:Válasszon'],
        'property.place_of_birth' => ['required'],
        'property.date_of_birth' => ['required','date','before:today'],
        'property.entry_card' => ['required','digits:6'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.email.email.unique' => 'Az e-mail cím már használatban van!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
        'property.department' => 'A részleg kitöltése kötelező!',
        'property.place_of_birth.required' => 'A születési hely mező kitöltése köptelező!',
        'property.date_of_birth.required' => 'A születési idő mező kitöltése kötelező!',
        'property.date_of_birth.before' => 'A születési idő nem haladhatja meg a mai napot!',

        'property.entry_card.required' => 'A belépő kártya számát kötelező megadni!',
        'property.entry_card.digits' => 'Hibás formátum, adjon meg 6 számjegyű számot',
    ];

    public function mount(User $user, bool $readonly, String $target){
        $this->user = $user;
        $this->target = $target;
        $this->property = $user->property()->first() ? $user->property()->first() : new UserProperty();
        $this->readonly = $readonly;   
    }

    public function avatarUploaded(String $avatar_path): Void
    {
        $this->avatar_path = $avatar_path;
    }

    public function languageUpdated(Array $languages): Void
    {
        $this->languages = $languages;
    }

    public function update(): Void 
    {                            
     
        $this->validate();

        $this->user->avatar_path = 
            $this->avatar_path !== null ? $this->avatar_path : $this->user->avatar_path ;

        $this->property->language_knowledge = 
            $this->languages !== null ? $this->languages : $this->property->language_knowledge;

        $this->emit('update', $this->user, $this->property);

        $this->emitUp('close');
    }

    public function create(): Void
    {

        $this->validate();
                
        $this->validate([
            'user.email' => ['unique:users,email'],
            'property.entry_card' => ['unique:user_properties,entry_card'],   
        ]);

        $this->property->language_knowledge = $this->languages;

        $this->user->avatar_path = $this->avatar_path;

        $this->emit('create', $this->user, $this->property);

        $this->emitUp('close');
      
    }

    public function render()
    {
        return view('livewire.modals.user-form.user-form');
    }

}
