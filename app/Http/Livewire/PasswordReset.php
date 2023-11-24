<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithControlledTable;
use App\Http\Traits\WithNotification;
use App\Http\Traits\WithSelfPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\PasswordReset as PwResetModel;
use App\Models\User;

class PasswordReset extends Component
{
    use WithSelfPagination;
    use WithControlledTable;
    use WithNotification;

    public $chackedRequests = [];

    protected $listeners = [
        'statusChange'
    ];

    public function mount(): void
    {
        $this->chackedRequests = collect($this->chackedRequests);
    }

    public function render(): View
    {
        $users = $this->setUsersFilters()
                    ->filteredData( User::whereRelation('pwReset','is_active',1) )
                    ->paginate($this->pageSize);

        return view('livewire.password-reset',['users' => $users])->layout('components.layouts.index');
    }

    public function resetAll(): void
    {
            $this->chackedRequests->each(function ($id){

                User::find($id)->update(['password' => Hash::make('password')]);

                PwResetModel::where('user_id', $id)
                ->first()
                ->update([
                    'is_active' => false,
                    'completed_at' => now(),
                ]);

                $this->alertSuccess(__('alert.password_reset_success'));

            });
    }

    public function statusChange($id): void
    {
        $this->chackedRequests = !$this->chackedRequests->contains($id) ?
                                $this->chackedRequests->push($id) :
                                $this->chackedRequests->reject(function($value) use($id){
                                    return $value == $id;
                                });
    }

}
