<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use App\Enum\Tools\Display\SizeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends BaseTool
{

    use HasFactory;
    const LANG = 'display';

    protected $guarded = ['id'];
    protected $casts = [
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
        return __(self::LANG . '.display');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::DISPLAY->value;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

 }
