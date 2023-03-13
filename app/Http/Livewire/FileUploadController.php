<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadController extends Component
{
    use WithFileUploads;

    public $avatar;

    protected $rules = [
        'avatar' => ['image','nullable'],
    ];

    protected $messages = [
        'avatar' => 'Csak kép formátum engedélyezett!',
    ];

    public function updatedAvatar(){
        $this->validate();

        $this->avatar ? 
            $this->emitUp('fileUploaded', $this->avatar->store('avatar','public')) : 
            $this->emitUp('fileUploaded','');
    }

    public function render()
    {
        return view('livewire.file-upload-controller');
    }
}
