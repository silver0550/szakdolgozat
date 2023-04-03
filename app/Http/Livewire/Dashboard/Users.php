<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use App\Enum\Notification;
use App\Http\Traits\WithSelfPagination;
use App\Http\Traits\Users\WithUsersTable;
use App\Http\Traits\WithNotification;

class Users extends Component
{
    use WithSelfPagination, WithUsersTable, WithNotification;

    protected $listeners = [
        'delete',
        'create',
        'update',
    ];
    
    public function render()
    {
      
        $users = $this->filteredUsers(User::class); 

        return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }

    public function delete(User $user){ // delete function doesn't use

        if(auth()->user()->can('delete', $user)){ 
            $user->property()->first()->delete();
            $user->delete();

            $this->sendSuccessResponse(Notification::DELETE_SUCCESS);
        
        } else { $this->sendFaildResponse(Notification::OPERATION_DENIED); }
  
    }

    public function create($user, $property): Void
    {

        if (auth()->user()->can("create", User::class)){
            $currentUser = User::create($user);

            $property['user_id'] = $currentUser->id;
            
            UserProperty::create($property);

            $this->sendSuccessResponse(Notification::CREATE_SUCCESS);

        } else { $this->sendFaildResponse(Notification::OPERATION_DENIED); }

    }

    public function update($user, $property): Void
    {

        $currentUser = User::find($user['id']);

        if(auth()->user()->can('update', $currentUser)){
            $currentUser->update($user);
            
            if ($currentUser->property()->first()){

                $currentUser->property()->first()->update($property);

            } else{
                
                $property['user_id'] = $currentUser->id;
                
                UserProperty::create($property);
            }
    
            $this->emitTo('dashboard.users-list','userRefresh'.$user['id']);

            $this->sendSuccessResponse(Notification::UPDATE_SUCCESS);

        } else { $this->sendFaildResponse(Notification::OPERATION_DENIED); }
        
    }


   
}
