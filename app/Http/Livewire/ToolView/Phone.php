<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PhoneRequest;
use App\Http\Traits\WithNotification;
use App\Models\Phone as PhoneModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Livewire\Component;

class Phone extends Component
{
    use WithNotification;

    public array $data = [];
    public string $request = PhoneRequest::class;

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

        PhoneModel::create($this->data);
        $this->alertSuccess(__('phone.create_success'));
        $this->emitUp('close');
    }

    public function render(): View
    {
        return view('livewire.tool-view.phone');
    }
}
