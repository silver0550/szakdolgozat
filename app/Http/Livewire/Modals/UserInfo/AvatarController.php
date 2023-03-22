<?php

namespace App\Http\Livewire\Modals\UserInfo;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class AvatarController extends Component
{
    use WithFileUploads;

    public User $user;
    public $unvalidedAvatar;


    protected $rules =[
        'unvalidedAvatar' => ['image','nullable'],
    ];

    public function updatedUnvalidedAvatar(){
        $this->validate();
        
        $this->emitUp('avatarUploaded', $this->unvalidedAvatar->store('avatar','public'));
  
    }

    public function mount(User $user){
        //
    }

    public function render()
    {
        $avatar = $this->unvalidedAvatar;
        return view('livewire.modals.user-info.avatar-controller',['avatar' => $avatar]);
    }
}
