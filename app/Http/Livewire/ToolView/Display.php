<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\DisplayRequest;
use App\Http\Traits\WithNotification;
use Illuminate\Support\Facades\Validator;
use App\Models\Display as DisplayModel;
use Livewire\Component;

class Display extends Component
{
    use WithNotification;

    public array $data = [];
    public string $request = DisplayRequest::class;

    protected $listeners = [
        'store'
    ];

    public function store(): void
    {
        $request = new $this->request;

        $validated = Validator::make(
            $this->data,
            $request->rules(),
            customAttributes: $request->attributes(),
        );

        $this->errorBag = $validated->messages();

        if ($validated->failed()) {
            $this->alertError('Ellenőrizza a megadott adatokat');

            return;
        }

        DisplayModel::create($this->data);
        $this->alertSuccess(__('display.create_success'));
        $this->emitUp('close');
    }
    public function render()
    {
        return view('livewire.tool-view.display');
    }
}
