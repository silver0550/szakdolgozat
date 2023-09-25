<?php

namespace App\Http\Livewire\Modals\ToolForm;

use App\Http\Requests\PhoneRequest;
use App\Http\Traits\WithNotification;
use App\Models\Phone;
use App\Providers\ClassRequestProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Livewire\Component;

class ToolForm extends Component
{
    use WithNotification;

    public string $classType = Phone::class;
    public string $classRequest = PhoneRequest::class;
    public $modelData = [];

    public function render(): View
    {
        return view('livewire.modals.tool-form.tool-form');
    }

//    public function store(): void
//    {
//        $request = new $this->classRequest;
//        $validated = Validator::make(
//            $this->modelData,
//            $request->rules(),
//            customAttributes: $request->attributes(),
//        );
//
//        $this->errorBag = $validated->messages();
//
//        if ($validated->passes()) {
//
//            $this->classType::create($this->modelData);
//            $this->alertSuccess('Az eszköz hozzáadása sikeresen megtörtént.');
//            $this->emitUp('close');
//
//        }
//    }

    public function updatedClassType()
    {
        $this->classRequest = ClassRequestProvider::get($this->classType);
        $this->reset('modelData');
        $this->resetErrorBag();
    }

}
