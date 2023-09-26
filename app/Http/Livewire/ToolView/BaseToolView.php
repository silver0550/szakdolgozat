<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Traits\WithNotification;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

abstract class BaseToolView extends Component
{
    use WithNotification;

    public array $data = [];
    public string $request;
    public string $model;

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
            $this->alertError(__('global.check_data'));

            return;
        }

        $this->model::create($this->data);
        $this->alertSuccess(__('global.create_success'));
        $this->emitUp('close');
    }

    public abstract function mount();
}
