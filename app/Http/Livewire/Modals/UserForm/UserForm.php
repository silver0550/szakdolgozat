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
        'property.department' => ['required','not_in:Válasszon'],
        'property.place_of_birth' => ['required'],
        'property.date_of_birth' => ['required','date','before:today'],
        'property.entry_card' => ['required','digits:6'],
    ];

    protected $validationAttributes = [
        'user.name' => 'Név',
        'user.email' => 'Email',
        'property.department' => 'Részleg',
        'property.place_of_birth' => 'Születési hely',
        'property.date_of_birth' => 'Születési idő',
        'property.entry_card' => 'Belépőkártya',
    ];

    public function mount(User $user, bool $readonly, String $target){
        $this->user = $user;
        $this->target = $target;
        $this->property = $user->property ?? new UserProperty();
        $this->readonly = $readonly;
    }

    public function avatarUploaded(string $avatar_path): Void
    {
        $this->avatar_path = $avatar_path;
    }

    public function languageUpdated(array $languages): Void
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
