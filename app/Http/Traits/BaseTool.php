<?php

namespace App\Http\Traits;

use App\Enum\Tool as EnumTool;

trait BaseTool
{
    public function type(): EnumTool {
        
        $className = class_basename($this);

        return EnumTool::getName($className);

    }

    public function keeper(): String {

        if (!$this->tool->user_id) {return 'Raktár';}

        return $this->tool->user->name;
    }

}