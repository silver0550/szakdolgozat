<?php

namespace App\Observers;

use App\Models\BaseTool;
use App\Models\Tool;

class BaseToolObserver
{
    public function created(BaseTool $toolModel): void
    {
        Tool::create([
            'owner_id' => $toolModel->id,
            'owner_type' => $toolModel::class,
        ]);
    }

    public function deleted(BaseTool $toolModel): void
    {
        Tool::query()
            ->where('owner_id', $toolModel->id)
            ->where('owner_type', $toolModel::class)
            ->first()
            ->delete();
    }
}
