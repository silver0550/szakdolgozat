<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends BaseTool
{
    use HasFactory;

    const LANG = 'phone';

    protected $guarded = ['id'];
    protected $fillable = [
        'imei',
        'manufacturer',
        'model_type',
        'description',
    ];

    public function getMyNameAttribute(): string
    {
        return __(self::LANG . '.phone');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::PHONE->value;
    }

    public static function getInputFields(): array
    {
        return [
            'imei',
            'manufacturer',
            'model_type',
            'description',
        ];
    }

    public function serialNumber(): string
    {
        return $this->imei;
    }
}
