<?php

namespace App\Models;

use App\Enum\ColorEnum;
use App\Enum\PictureProviderEnum;
use App\Enum\Tools\Tablet\DisplaySizeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tablet extends BaseTool
{
    use HasFactory;

    const LANG = 'tablet';

    protected $guarded = ['id'];
    protected $casts = [
        'display_size' => DisplaySizeEnum::class,
        'color' => ColorEnum::class,
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
        return __(self::LANG . '.tablet');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::TABLET->value;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
