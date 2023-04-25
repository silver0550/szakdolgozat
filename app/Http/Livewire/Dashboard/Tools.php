<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Phone;
use Livewire\Component;
use App\Models\Tool;
use App\Models\User;

class Tools extends Component
{


    public function render()
    {
        // $tools = Tool::find(6)->user()->get();

        $self = Tool::with('owner');
        
        dd($self->where('user_id',null)->get()->map( function (Tool $tool){ return $tool->owner;}));

        return view('livewire.dashboard.tools',['tools' => $self])->layout('components.layouts.index');
    }
}
