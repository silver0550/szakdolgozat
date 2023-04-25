<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;

class Phone extends Model
{
    use HasFactory;

    public function tools(){

        return $this->morphOne(Tool::class, 'owner');
    }

}
