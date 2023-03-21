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
    public $avatar;


    protected $rules =[
        'unvalidedAvatar' => ['image','nullable'],
    ];

    public function updatedUnvalidedAvatar(){
        $this->validate();
        
        $this->avatar = $this->unvalidedAvatar;

        $this->emitUp('avatarUploaded', 'storage/'.$this->avatar->store('avatar','public'));
  
    }

    public function mount(User $user){
        //
    }

    public function render()
    {
        return view('livewire.modals.user-info.avatar-controller');
    }
}
