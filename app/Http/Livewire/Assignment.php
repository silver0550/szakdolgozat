<?php

namespace App\Http\Livewire;

use App\Enum\StatusEnum;
use App\Http\Traits\WithNotification;
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
    public bool $allUserCheckboxesSelected = false;

    public function render()
    {
        $includedIds = $this->storagePuffer
            ? $this->filteredData($this->storagePuffer)
            : [];

        $tools = Tool::with('view')
            ->whereNull('user_id')
            ->where('status', StatusEnum::ACTIVE)
            ->where(function ($query) use ($includedIds) {
                $query->orWhereIn('id', $includedIds)
                    ->orWhereHas('view', function ($subquery) {
                        $subquery->where('serial_number', 'LIKE', '%' . $this->search . '%');
                    });
            })->get();

        $userHasTools = $this->userId ? User::find($this->userId)->tools : null;
        $title = __('assignment.title');

        return view('livewire.assignment', [
            'title' => $title,
            'tools' => $tools,
            'userHasTools' => $userHasTools,
        ])->layout('components.layouts.index');
    }

    public function captureTool(): void
    {
        if (!user()->hasRole('system|admin')) {              //TODO tool assign
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
            ->update([
                'user_id' => null,
            ]);

        $this->reset('userPuffer');
    }

    public function releaseTool(): void
    {
        if (!user()->hasRole('system|admin')) {              //TODO tool assign
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

        Tool::query()
            ->whereIn('id', $this->filteredData($this->storagePuffer))
            ->update([
                'user_id' => $this->userId,
            ]);

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

    public function captureAllTools(): void
    {
        if (!user()->hasRole('system|admin')) {              //TODO tool assign
            $this->alertError(__('alert.access_denied'));

            return;
        }

        Tool::query()
            ->where('user_id', $this->userId)
            ->update([
                'user_id' => null,
            ]);

        $this->reset('userPuffer');

    }

}
