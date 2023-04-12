<?php

namespace App\Filters\String;

use Closure;
use Illuminate\Support\Str;

class FirstUpper
{

    public function handle(String $name, Closure $next){

        return $next(Str::title($name));
    }


}