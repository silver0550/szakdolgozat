<?php

namespace App\Contracts\Services;

use App\Enum\Tool as EnumTool;

interface IsTool
{
    public function type(): EnumTool;

    public function serialNumber(): String;

    public function keeper(): String;

}
