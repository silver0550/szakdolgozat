<?php

namespace App\Http\Livewire\Modals\UserForm;

use App\Http\Traits\WithNotification;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class AvatarController extends Component
{
    use WithFileUploads;
    use WithNotification;

    public User $user;
    public $unvalidedAvatar;
    public $validAvatar;


    protected $rules =[
        'unvalidedAvatar' => ['image','nullable'],
    ];

    public function updatedUnvalidedAvatar(){

        $validator = Validator::make(['unvalidedAvatar' => $this->unvalidedAvatar], [
            'unvalidedAvatar' => ['image','nullable']
        ]);

        if ($validator->fails()) {
            $this->alertWarning(__('alert.invalid_img'));

            $this->addError(
                $validator->errors()->keys()[0],
                __('alert.invalid_img')
            );
        } else {
            $this->validAvatar = $this->unvalidedAvatar;

            $this->emitUp('avatarUploaded', $this->validAvatar->store('avatar', 'public'));
        }
    }

    public function mount(User $user){
        //
    }

    public function render()
    {
        return view('livewire.modals.user-form.avatar-controller');
    }
}
