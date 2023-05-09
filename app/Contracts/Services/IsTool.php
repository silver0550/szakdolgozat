<?php

namespace App\Contracts\Services;

use App\Enum\Tool as EnumTool;
use Illuminate\Validation\Validator;

interface IsTool
{
    public function type(): String;

    public function serialNumber(): String;

    public function keeper(): String;

    public function saveToTools(): Void;

    public static function getInputs(): Array;

    public static function getValidator(array $validation);

    

}
