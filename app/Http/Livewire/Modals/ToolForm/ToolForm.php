<?php

namespace App\Http\Livewire\Modals\ToolForm;

use Livewire\Component;


class ToolForm extends Component
{

    public $classType;
    public $model;
    public $data = []; //TODO: DTO need because of the rules

    public function render()
    {
        return view('livewire.modals.tool-form.tool-form');
    }

    public function dede(){

        dd($this->data);
       
    }

    public function updatedClassType(){

        $this->classType ? $this->model = new $this->classType : $this->model = null;

    }
}
