<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\BaseTool;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Notebook extends Model implements IsTool
{
    use HasFactory, BaseTool;


    public function tool(){

        return $this->morphOne(Tool::class, 'owner');
    
    }

    public function serialNumber(): String{

        return $this->serial_number;
    }

    public function getInputs(): Array {
        
        return [
            'serial_number' => 'Sorozatszám',
            'manufacturer' => 'Gyártó',
            'model_type' => 'Típus',
            'description' => 'Leírás',
        ];
    }
}
