<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithNotification;
use App\Http\Traits\WithSelfPagination;
use App\Models\PasswordReset as PwResetModel;
use App\Models\User;
use App\Service\PasswordResetService;
use Illuminate\View\View;
use Livewire\Component;

class PasswordReset extends Component
{
    use WithSelfPagination;
    use WithNotification;

    public mixed $search = null;
    public mixed $department = null;
    public array $checkedRequests = [];
    private PasswordResetService $service;

    protected $listeners = [
        'statusChanged'
    ];

    public function render(): View
    {
        $users = $this->service->getFilteredPasswordRequest([
            'search' => $this->search,
            'department' => $this->department,
        ])->paginate($this->pageSize);

        return view('livewire.password-reset', [
            'users' => $users,
            'title' => __('password_reset.password_reset'),
        ])->layout('components.layouts.index');
    }

    public function resetAll(): void
    {
        if ($this->requestIsEmpty()) {
            $this->alertWarning(__('alert.missing_request'));

            return;
        }

        foreach ($this->checkedRequests as $id => $is_active) {
            if ($is_active) {
                User::find($id)->update(['password' => User::BASE_PASSWORD]);

                PwResetModel::query()
                    ->where('user_id', $id)
                    ->first()
                    ->update([
                        'is_active' => false,
                        'completed_at' => now(),
                    ]);
            }
        }

        $this->reset('checkedRequests');
        $this->alertSuccess(__('alert.password_reset_success'));
    }

    public function statusChanged($id): void
    {
        if (array_key_exists($id, $this->checkedRequests)) {
            $this->checkedRequests[$id] = !$this->checkedRequests[$id];
        } else {
            $this->checkedRequests[$id] = true;
        }
    }

    protected function requestIsEmpty(): bool
    {
        return collect($this->checkedRequests)->filter()->count() == 0;
    }

    public function boot(PasswordResetService $service): void
    {
        $this->service = $service;
    }
}
