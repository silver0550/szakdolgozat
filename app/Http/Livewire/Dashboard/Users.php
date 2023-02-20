<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Http\Enums\PasswordEnum;


class Users extends Component
{
    public $sortColumnName = 'id';
    public $sortDirection = 'asc';

    public $paginate = 10;

    protected $listeners = [
        'refresh' => '$refresh',
        'sort',
    ];


    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }

    public function render()
    {
        $users = User::where('email', '!=', PasswordEnum::SUPER_ADMIN->value)
            ->orderBy($this->sortColumnName,  $this->sortDirection)
            ->paginate($this->paginate); 

        return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }
}
