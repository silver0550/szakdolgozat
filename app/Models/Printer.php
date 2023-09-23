<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Printer extends BaseTool
{
    use HasFactory;

    const LANG = 'printer';

    public function serialNumber(): string
    {
        return $this->serial_number;
    }

    public function getMyNameAttribute(): string
    {
        return __(self::LANG . '.printer');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::PRINTER->value;
    }

    public static function getInputFields(): array
    {
        return [];
    }

}
