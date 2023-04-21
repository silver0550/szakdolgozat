<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithControlledTable;
use App\Http\Traits\WithNotification;
use App\Http\Traits\WithSelfPagination;
use Livewire\Component;
use App\Models\PasswordReset as PwResetModel;
use App\Models\User;
use App\Enum\Notification;

class PasswordReset extends Component
{
    use WithSelfPagination, WithControlledTable, WithNotification;

    public $chackedRequests = [];

    protected $listeners = [
        'statusChange'
    ];

    public function mount(){

        $this->chackedRequests = collect($this->chackedRequests);

    }

    public function render()
    {

        $users = $this->setUsersFilters()
                    ->filteredUsers( User::whereRelation('pwReset','isActive',1) )
                    ->paginate($this->pageSize);

        return view('livewire.password-reset',['users' => $users])->layout('components.layouts.index');
    }

    public function resetAll(){


            $this->chackedRequests->each(function ($id){

                User::find($id)->update(['password' => env('DEFAULT_PASSWORD')]);

                PwResetModel::where('user_id', $id)
                ->first()
                ->update([
                    'isActive' => false,
                    'completed_at' => now(),
                ]);

                $this->sendSuccessResponse(Notification::PASSWORD_RESET_SUCCESS);
                
            });
    }

    public function statusChange($id){
 
        $this->chackedRequests = !$this->chackedRequests->contains($id) ?
                                $this->chackedRequests->push($id) :
                                $this->chackedRequests->reject(function($value) use($id){
                                    return $value == $id;
                                });
    }
    
}
