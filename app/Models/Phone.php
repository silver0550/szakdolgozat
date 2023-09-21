<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use App\Enum\PictureProviderEnum;
use App\Http\Traits\BaseTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model implements IsTool
{
    use HasFactory, BaseTool; //TODO: leszármaztatni trait helyett

    const LANG = 'phone';

    protected $guarded = ['id'];
    protected $fillable = [
        'IMEI',
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
