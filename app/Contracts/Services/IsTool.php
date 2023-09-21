<?php

namespace App\Contracts\Services;

use App\Enum\Tool as EnumTool;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Validation\Validator;

interface IsTool
{
    public function tool(): MorphOne;
    public function serialNumber(): string;
    public function keeper(): string;
    public function saveToTools(): void;
    public function getMyNameAttribute(): string;
    public function getImgAttribute(): string;
    public static function getInputFields(): array;



}
