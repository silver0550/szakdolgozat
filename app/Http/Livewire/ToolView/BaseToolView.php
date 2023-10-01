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
    public bool $readOnly;

    protected $listeners = [
        'store',
        'edit',
    ];

    public function store(): void
    {
        if ( !user()->hasPermissionTo('create-tool') ){
            $this->alertError(__('alert.access_denied'));

            return;
        }

        if($this->isValid()) {
            $this->model::create($this->data);

            $this->alertSuccess(__('global.create_success'));
            $this->emitUp('close');
        }
    }
    public function edit(): void
    {
        if ( !user()->hasPermissionTo('edit-tool') ){
            $this->alertError(__('alert.access_denied'));

            return;
        }

        if($this->isValid($this->tool->owner->id)) {

            $this->tool->owner->update($this->data);

            $this->alertSuccess(__('global.create_success'));

            $this->emit('toolRefresh'.$this->tool->id);
            $this->emitUp('close');
        }
    }

    private function isValid($updatedId = null): bool
    {
        $request = new $this->request;

        $validated = Validator::make(
            $this->data,
            $request->rules($updatedId),
            customAttributes: $request->attributes(),
        );

        $this->errorBag = $validated->messages();
        if ($validated->failed()) {
            $this->alertError(__('global.check_data'));
            return false;
        }

        return true;
    }

    public function setData(): void
    {
        foreach (array_keys((new $this->request)->attributes()) as $input) {
            $this->data[$input] = $this->tool->owner->$input;
        }
    }

    public function booted(): void
    {
        $this->readOnly = !user()->hasRole('system|admin');
    }

}
