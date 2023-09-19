<?php

namespace App\Contracts\Services;

use App\Enum\Tool as EnumTool;
use Illuminate\Validation\Validator;

interface IsTool
{
    public function type(): string;

    public function serialNumber(): string;

    public function keeper(): string;

    public function saveToTools(): void;

    public static function getInputs(): array;

    public static function getValidator(array $validation);



}
