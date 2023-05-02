<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use App\Http\Traits\BaseTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;

class Phone extends Model implements IsTool
{
    use HasFactory, BaseTool;

    public function tool(){

        return $this->morphOne(Tool::class, 'owner');
    }

    public function serialNumber(): String{

        return $this->IMEI;
    }

    public function getInputs(): Array {
        
        return [];
    }

}
