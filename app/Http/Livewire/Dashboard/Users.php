<?php

namespace App\Http\Livewire\Dashboard;

use App\Interfaces\UserServiceInterface;
use App\Models\Tool;
use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use App\Http\Traits\WithSelfPagination;
use App\Http\Traits\WithNotification;

class Users extends Component
{
    use WithSelfPagination;
    use WithNotification;

    public array $filters = [];
    public array $sorter = [
        'name' => 'id',
        'direction' => true,
    ];
    private UserServiceInterface $service;

    protected $listeners = [
        'delete',
        'create',
        'update',
    ];

    public function render()
    {
        $users = $this->service
            ->getFilteredUsers($this->filters, $this->sorter)
            ->paginate($this->pageSize);

        return view('livewire.dashboard.users',[
            'users' => $users,
            'title' => __('user.users'),
        ])->layout('components.layouts.index');
    }

    public function sort($columnName): void
    {
        $columnName === $this->sorter['name']
            ? $this->sorter['direction'] = !$this->sorter['direction']
            : $this->sorter['direction'] = true;

        $this->sorter['name'] = $columnName;
    }
    public function boot(UserServiceInterface $service):void
    {
        $this->service = $service;
    }
    public function delete(User $user){ // delete function doesn't use

        if(user()->can('delete-user')){
            Tool::query()
                ->where('user_id', $user->id)
                ->update(['user_id' => null]);
            $user->property?->delete();
            $user->delete();

            $this->alertSuccess(__('alert.delete_user_success'));

        } else {
            $this->alertError(__('alert.delete_user_fail'));
            $this->alertWarning(__('alert.access_denied'));
        }
    }

    public function create($user, $property): Void
    {
        if (user()->can('create-user')){
            $currentUser = User::create($user);

            $property['user_id'] = $currentUser->id;

            UserProperty::create($property);

            $this->alertSuccess(__('alert.create_user_success'));

        } else {
            $this->alertError(__('alert.create_user_fail'));
            $this->alertWarning(__('alert.access_denied'));
        }
    }

    public function update($user, $property): Void
    {
        $currentUser = User::find($user['id']);

        if(user()->can('edit-user')){
            $currentUser->update($user);

            $currentUser->property->update($property);

            $this->emitTo('dashboard.users-list','userRefresh'.$user['id']);

            $this->alertSuccess(__('alert.update_user_success'));

        } else {
            $this->alertError(__('alert.update_user_fail'));
            $this->alertWarning(__('alert.access_denied'));
        }
    }

    public function updatedFilters(){
        $this->resetPage();
    }
}
