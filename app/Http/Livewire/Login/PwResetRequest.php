<?php

namespace App\Http\Livewire\Login;

use App\Filters\Builder\Active;
use App\Filters\Builder\HasProperty;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Traits\WithNotification;
use App\Models\PasswordReset as PasswordResetModel;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class PwResetRequest extends ModalComponent
{
    use WithNotification;

    public $email;
    public $dateOfBirth;
    public $entryCard;

    public function send(): void
    {
        if($this->isValid()){
            $user = User::query()
                ->with('property')
                ->where('email', $this->email)
                ->whereHas('property',
                    fn($query) => $query->where('date_of_birth', $this->dateOfBirth))
                ->whereHas('property',
                    fn($query) => $query->where('entry_card', $this->entryCard))
                ->first();

            if (is_null($user)) {
                $this->alertError(__('alert.password_reset_fail'));

                return;
            }

            $this->alertSuccess(__('alert.password_reset_success'));

            $this->store($user->id);

            $this->closeModal();
        }
    }

    public function store(int $id): void
    {
        PasswordResetModel::updateOrCreate(
            ['user_id' => $id],
            ['is_active' => true]
        );
    }

    public function render(): View
    {
        return view('livewire.login.pw-reset-request');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    /**
     * @return void
     */
    public function isValid(): bool
    {
        $request = new PasswordResetRequest;

        $validated = Validator::make(
            [
                'email' => $this->email,
                'dateOfBirth' => $this->dateOfBirth,
                'entryCard' => $this->entryCard,
            ],
            $request->rules(),
            customAttributes: $request->attributes(),
        );

        $this->errorBag = $validated->messages();

        if ($validated->failed()) {
            $this->alertError(__('global.check_data'));

            return false;
        }

        return true;
    }
}
