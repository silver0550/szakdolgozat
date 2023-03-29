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

    protected $listeners = [
        'close',
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
        return view('livewire.modals.new-user-form');
    }

    public function close(){
     
        $this->closeModal();
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
