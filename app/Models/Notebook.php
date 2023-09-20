<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use App\Enum\PictureProviderEnum;
use App\Http\Traits\BaseTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Validator;

class Notebook extends Model implements IsTool
{
    use HasFactory, BaseTool;

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

//    ---------
    public function serialNumber(): string
    {

        return $this->serial_number;
    }

    public static function getInputs(): array
    {

        return [
            'serial_number' => 'Sorozatszám',
            'manufacturer' => 'Gyártó',
            'model_type' => 'Típus',
            'description' => 'Leírás',
        ];
    }

    public static function getValidator(array $validate)
    {

        return Validator::make(
            $validate,
            [
                'serial_number' => ['required'],
                'manufacturer' => ['required'],
                'model_type' => ['required'],
                'description' => ['nullable'],
            ], [
                'serial_number.required' => 'Egyedi azonosító kitöltése kötelező',
                'manufacturer.required' => 'Gyártó megnevezése kötelező',
                'model_type.required' => 'Model megnevezése kötelező',

            ]
        );
    }
}
