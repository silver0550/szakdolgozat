<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use App\Models\User;
use Livewire\Component;

class Assignment extends Component
{
    public ?int $userId = null;
    public function render()
    {
        $tools = Tool::all();
        $userHasTools = $this->userId ? User::find($this->userId)->tools : null;

        $title = __('assignment.title');
        return view('livewire.assignment',[
            'title' => $title,
            'tools' => $tools,
            'userHasTools' => $userHasTools,
        ])->layout('components.layouts.index');
    }




}
