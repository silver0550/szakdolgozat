<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

abstract class BaseTool extends Model
{
    public function tool(): MorphOne
    {
        return $this->morphOne(Tool::class, 'owner');
    }

    public function keeper(): string
    {
        if (!$this->tool->user_id) {
            return 'Raktár';
        }

        return $this->tool->user->name;
    }

    public abstract function serialNumber(): string;

    public abstract function getMyNameAttribute(): string;

    public abstract function getImgAttribute(): string;

//    public abstract static function getInputFields(): array;

}
