<?php

namespace App\Http\Traits;

use App\Service\ToolService;
trait BaseTool
{
    public function type(): String {
        
        return ToolService::displayableName(get_class($this));

    }

    public function keeper(): String {

        if (!$this->tool->user_id) {return 'Raktár';}

        return $this->tool->user->name;
    }

}