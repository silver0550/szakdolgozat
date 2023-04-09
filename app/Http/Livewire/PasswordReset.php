<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithSelfPagination;
use Livewire\Component;
use App\Models\PasswordReset as PwResetModel;
use App\Models\User;

class PasswordReset extends Component
{
    use WithSelfPagination;

    //TODO: controll not work

    public $chackedRequests = [];

    protected $listeners = [
        'statusChange'
    ];

    public function mount(){

        $this->chackedRequests = collect($this->chackedRequests);

    }

    public function render()
    {
        $requests = PwResetModel::where('isActive', 1)
                    ->get()
                    ->map( fn($e) => User::find($e->user_id))
                    ->toQuery()
                    ->paginate($this->pageSize);


        return view('livewire.password-reset',['requests' => $requests])->layout('components.layouts.index');
    }

    public function resetAll(){


            collect($this->chackedRequests)->each(function ($id){

                    User::find($id)->update(['password' => env('DEFAULT_PASSWORD')]);

                    PwResetModel::where('user_id', $id)
                    ->first()
                    ->update([
                        'isActive' => false,
                        'completed_at' => now(),
                ]);
                
            });
    }

    public function statusChange($id){
 
        $this->chackedRequests = !$this->chackedRequests->contains($id) ?
                                $this->chackedRequests->push($id) :
                                $this->chackedRequests->reject(function($value) use($id){
                                    return $value == $id;
                                });
    }


        // $this->chackedRequests[$id] = array_key_exists($id, $this->chackedRequests) ?
        //                             !$this->chackedRequests[$id] :
        //                             true;
    
}
