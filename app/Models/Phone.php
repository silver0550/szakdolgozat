<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use App\Http\Traits\BaseTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;
use Illuminate\Support\Facades\Validator;

class Phone extends Model implements IsTool
{
    use HasFactory, BaseTool;

    protected $fillable = [
        'IMEI',
        'manufacturer',
        'model_type',
        'description',
    ];

    public function tool(){

        return $this->morphOne(Tool::class, 'owner');
    }

    public function serialNumber(): String{

        return $this->IMEI;
    }

    public static function getInputs(): Array {
        
        return [
            'IMEI' => 'IMEI',
            'manufacturer' => 'Gyártó',
            'model_type' => 'Típus',
            'description' => 'Leírás',
        ];
    }

    public static function getValidator(Array $validate) {

        return Validator::make(
            $validate,
            [
                'IMEI' => ['required','digits:12'],
                'manufacturer' => ['required'],
                'model_type' => ['required'],
                '.description' => ['nullable'],
            ],
            [
                'IMEI.required' => 'Egyedi azonosító kitöltése kötelező',
                'IMEI.digits' => 'Az IMEI számnak 12 számjegyű számnak kell lennie.',
                'serial_number.number' => 'Egyedi azonosító kitöltése kötelezp',
                'manufacturer.required' => 'Gyártó megnevezése kötelező',
                'model_type.required' => 'Típus megnevezése kötelező',
            ]);

    }

}
