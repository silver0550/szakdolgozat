<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Tool;
use App\Http\Traits\WithSelfPagination;

class Tools extends Component
{

    use WithSelfPagination;

    public function render()
    {

        $tools = Tool::with('owner','user')->paginate($this->pageSize);

        return view('livewire.dashboard.tools',['tools' => $tools])->layout('components.layouts.index');
    }
}
