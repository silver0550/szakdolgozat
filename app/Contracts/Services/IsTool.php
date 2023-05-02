<?php

namespace App\Contracts\Services;

use App\Enum\Tool as EnumTool;

interface IsTool
{
    public function type(): String;

    public function serialNumber(): String;

    public function keeper(): String;

    public function getInputs(): Array;

}
