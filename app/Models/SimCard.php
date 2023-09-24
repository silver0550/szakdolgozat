<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use App\Enum\Tools\SimCard\ProviderEnum;
use App\Enum\Tools\SimCard\SizeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SimCard extends BaseTool
{
    use HasFactory;

    const LANG = 'sim_card';

    protected $casts = [
        'provider' => ProviderEnum::class,
        'size' => SizeEnum::class,
    ];
    public function serialNumber(): string
    {
        return $this->serial_number;
    }

    public function getMyNameAttribute(): string
    {
        return __(self::LANG . '.sim_card');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::SIM_CARD->value;
    }

    public static function getInputFields(): array
    {
        return [];
    }
}
