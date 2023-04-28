<?php

namespace App\Models;

use App\Contracts\Services\IsTool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\BaseTool;

class Notebook extends Model implements IsTool
{
    use HasFactory, BaseTool;


    public function tool(){

        return $this->morphOne(Tool::class, 'owner');
    
    }

    public function serialNumber(): String{

        return $this->serial_number;
    }
}
