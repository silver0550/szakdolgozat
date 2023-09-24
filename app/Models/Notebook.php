<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Notebook extends BaseTool
{
    use HasFactory;

    const LANG = 'notebook';

    protected $fillable = [
        'serial_number',
        'manufacturer',
        'model_type',
        'description'
    ];

    public function tool(): MorphOne
    {
        return $this->morphOne(Tool::class, 'owner');
    }

    public function getImgAttribute(): string
    {
        return PictureProviderEnum::NOTEBOOK->value;
    }

    public function serialNumber(): string
    {
        return $this->serial_number;
    }

    public function serial_number(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::upper($value), //TODO: Nem működik
        );
    }
    public static function getInputFields(): array
    {
        return [
            'serial_number',
            'manufacturer',
            'model_type',
            'description',
        ];
    }

    public function getMyNameAttribute(): string
    {
        return __('notebook.notebook');
    }
}
