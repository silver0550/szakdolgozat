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

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function getInputFields(): array
    {
        return [];
    }
    public function serialNumber(): string
    {
        return $this->imei;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getMyNameAttribute(): string
    {
        return __(self::LANG . '.phone');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::PHONE->value;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */


}
