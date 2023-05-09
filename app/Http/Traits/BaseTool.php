<?php

namespace App\Http\Traits;

use App\Service\ToolService;
use App\Models\Tool;
trait BaseTool
{
    public function type(): String {
        
        return ToolService::displayableName(get_class($this));

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