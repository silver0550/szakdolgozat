<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithNotification;
use App\Interfaces\AssignmentServiceInterface;
use App\Models\Tool;
use App\Models\User;
use Livewire\Component;

class Assignment extends Component
{
    use WithNotification;

    public ?int $userId = null;
    public ?string $search = null;
    public array $storagePuffer = [];
    public array $userPuffer = [];

    private AssignmentServiceInterface $service;

    public function render()
    {
        $includedIds = $this->storagePuffer
            ? $this->filteredData($this->storagePuffer)
            : [];

        $tools = $this->service->getFilteredTools($includedIds, $this->search);

        return view('livewire.assignment', [
            'title' => __('side_menu.assignment'),
            'tools' => $tools,
            'userHasTools' => $this->userId ? User::find($this->userId)->tools : null,
        ])->layout('components.layouts.index');
    }

    public function boot(AssignmentServiceInterface $service)
    {
        $this->service = $service;
    }

    public function captureTool(): void
    {
        if (!user()->hasRole('system|admin')) {
            $this->alertError(__('alert.access_denied'));

            return;
        }

        if (is_null($this->userId)) {
            $this->alertWarning(__('alert.missing_user'));

            return;
        }

        if (!$this->getNumberOfSelected($this->userPuffer)) {
            $this->alertWarning(__('alert.missing_tool'));

            return;
        }

        Tool::query()
            ->whereIn('id', $this->filteredData($this->userPuffer))
            ->get()
            ->each(fn($tool) => $tool->update(['user_id' => null]));

        $this->reset('userPuffer');
    }

    public function captureAllTools(): void
    {
        if (!user()->hasRole('system|admin')) {
            $this->alertError(__('alert.access_denied'));

            return;
        }

        Tool::query()
            ->where('user_id', $this->userId)
            ->get()
            ->each(fn($tool) => $tool->update(['user_id' => null]));

        $this->reset('userPuffer');
    }

    public function releaseTool(): void
    {
        if (!user()->hasRole('system|admin')) {
            $this->alertError(__('alert.access_denied'));

            return;
        }

        if (is_null($this->userId)) {
            $this->alertWarning(__('alert.missing_user'));

            return;
        }

        if (!$this->getNumberOfSelected($this->storagePuffer)) {
            $this->alertWarning(__('alert.missing_tool'));

            return;
        }

        Tool::whereIn('id', $this->filteredData($this->storagePuffer))
            ->get()
            ->each(fn($tool) => $tool->update(['user_id' => $this->userId]));

        $this->reset('storagePuffer');
    }

    public function getNumberOfSelected(array $puffer): int
    {
        $count = $puffer
            ? $this->filteredData($puffer)
            : [];

        return count($count);
    }

    public function filteredData(array $data): array
    {
        return array_keys(array_filter($data, fn($value) => $value));
    }
}
