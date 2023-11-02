<?php

namespace App\Http\Livewire\Modals;

use App\Http\Traits\WithNotification;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Rules\equal;
use App\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends ModalComponent
{
    use WithNotification;

    public $user;

    public $passwords = [
        'current' => '',
        'new' => '',
        'newAgain' => '',
    ];
    protected $messages = [
        'passwords.current.required' => 'Az aktuális jelszó kitöltése kötelező!',
        'passwords.new.required' => 'Az új jelszó kitöltése kötelező!',
        'passwords.new.min' => 'A jelszónak legalább 6 karakter hosszúnak kell lennie!',
        'passwords.new' => 'A jelszónak tartalmaznia kell egy számot és egy nagybetűt!',
        'passwords.newAgain.required' => 'A megerősítés kitöltése kötelező!',
        'passwords.newAgain' => 'A megegerősítés nem egyezik az új jelszóval!',
    ];

    public function mount(User $user){
        $this->user = $user;

    }
    public function render()
    {
        return view('livewire.modals.change-password');
    }

    public function save(){

        $this->validate([
                'passwords.current' => [
                    'required',
                    function($attriute, $value, $fail){             //TODO: don't check password
                        if (!Hash::check($value, $this->user->password)){
                            $fail('Hibás jelszó!');
                        }
                    }],
                'passwords.new' => ['required','min:6', new Password],
                'passwords.newAgain' => ['required', new equal($this->passwords['new'])],
        ]);

        $this->user->update(['password' => Hash::make($this->passwords['new'])]);

        $this->closeModal();

        $this->alertSuccess('A jelszava megváltozott.');

    }
    public static function modalMaxWidth(): string
    {
        return '2xl';
    }


    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

}
