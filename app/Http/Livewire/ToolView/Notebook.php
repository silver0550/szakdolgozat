<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\NotebookRequest;
use App\Http\Traits\WithNotification;
use Illuminate\Support\Facades\Validator;
use App\Models\Notebook as NotebookModel;
use Livewire\Component;

class Notebook extends Component
{
    use WithNotification;

    public array $data = [];
    public string $request = NotebookRequest::class;

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

        NotebookModel::create($this->data);
        $this->alertSuccess(__('notebook.create_success'));
        $this->emitUp('close');
    }
    public function render()
    {
        return view('livewire.tool-view.notebook');
    }
}
