<?php

namespace App\Http\Livewire\Modals\UserForm;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class AvatarController extends Component
{
    use WithFileUploads;

    public User $user;
    public $unvalidedAvatar;
    public $validAvatar;


    protected $rules =[
        'unvalidedAvatar' => ['image','nullable'],
    ];

    public function updatedUnvalidedAvatar(){
        $this->validate();
        
        $this->validAvatar = $this->unvalidedAvatar;
        
        $this->emitUp('avatarUploaded', $this->validAvatar->store('avatar','public'));
  
    }

    public function mount(User $user){
        //
    }

    public function render()
    {
        return view('livewire.modals.user-form.avatar-controller');
    }
}
