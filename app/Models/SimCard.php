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

    protected $guarded =['id'];
    protected $casts = [
        'provider' => ProviderEnum::class,
        'size' => SizeEnum::class,
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
        return __(self::LANG . '.sim_card');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::SIM_CARD->value;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
