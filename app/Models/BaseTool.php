<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

abstract class BaseTool extends Model
{
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
    public function getKeeperAttribute(): string|null
    {
        return $this->tool?->user?->name;
    }

    public function serialNumber(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => Str::upper($value),
        );
    }

    public abstract function getMyNameAttribute(): string;

    public abstract function getImgAttribute(): string;

//    public abstract static function getInputFields(): array;

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function tool(): MorphOne
    {
        return $this->morphOne(Tool::class, 'owner');
    }

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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
