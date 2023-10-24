<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Traits\WithNotification;
use App\Models\BaseTool;
use App\Models\ToolsView;
use Illuminate\View\View;
use Livewire\Component;

class ToolsList extends Component
{
    use WithNotification;

    public ToolsView $tool;
    public BaseTool $model;

    protected $listeners = [];
    public function booted(): void
    {
        $this->listeners = array_merge($this->listeners, ['toolRefresh'.$this->tool->id => '$refresh']);
    }
    public function mount(ToolsView $tool): void
    {
        $this->model = $tool->owner;
    }

    public function render(): View
    {
        return view('livewire.dashboard.tools-list');
    }

    public function destroy(): void
    {
        if(user()->can('delete-tool')){

            $this->model->delete();
            $this->alertSuccess(__('alert.delete_tool_success'));

            $this->emitUp('refresh');

        } else {
            $this->alertError(__('alert.delete_tool_fail'));
            $this->alertWarning(__('alert.access_denied'));
        }
    }
}
