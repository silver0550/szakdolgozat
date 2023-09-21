<?php

namespace App\Http\Traits;

use App\Service\ToolService;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait BaseTool
{
    public function tool(): MorphOne
    {
        return $this->morphOne(Tool::class, 'owner');
    }

    public function keeper(): String {

        if (!$this->tool->user_id) {return 'Raktár';}

        return $this->tool->user->name;
    }

    public function saveToTools(): void {

        Tool::create([
            'owner_type' => get_class($this),
            'owner_id' =>$this->id,
        ]);
    }

}
