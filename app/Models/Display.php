<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends BaseTool
{

    const LANG = 'display';

    use HasFactory;

    public function serialNumber(): string
    {
        return $this->serial_number;
    }

    public function getMyNameAttribute(): string
    {
        return __(self::LANG . '.display');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::DISPLAY->value;
    }

    public static function getInputFields(): array
    {
        return [
            'serial_number',
            'manufacturer',
            'model_type',
            'size',
            'resolution',
            'is_flexible',
            'description',
        ];
    }


}
