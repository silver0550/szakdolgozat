<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
