<?php

namespace App\Http\Livewire\Modals\ToolForm;

use App\Http\Traits\WithNotification;
use Livewire\Component;
// use Illuminate\Support\MessageBag;
class ToolForm extends Component
{

    use WithNotification;

    public $classType;
    public $modelData = [];

    public function render()
    {
        return view('livewire.modals.tool-form.tool-form');
    }

    public function store(){

        $validated = $this->classType::getValidator($this->modelData);

        $this->errorBag = $validated->messages();

        if($validated->passes()){

            $this->classType::create($this->modelData)->saveToTools();
            
            $this->sendSuccessResponse('Az eszköz hozzáadása sikeresen megtörtént.');
            
            $this->emitUp('close');

        }

        
    }

    public function updatedClassType(){
        
       $this->reset('modelData');
       $this->resetErrorBag();
    }

}
