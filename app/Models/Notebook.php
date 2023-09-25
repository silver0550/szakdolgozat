<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Notebook extends BaseTool
{
    use HasFactory;

    const LANG = 'notebook';

    protected $guarded = ['id'];

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::NOTEBOOK->value;
    }

    public function serialNumber(): string
    {
        return $this->serial_number;
    }

//    public function serialNumber(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => $value,
//            set: fn($value) => Str::upper($value), //TODO: Nem működik
//        );
//    }

    public function getMyNameAttribute(): string
    {
        return __('notebook.notebook');
    }
}
