<?php

namespace App\Service;

use App\Models\Phone;
use App\Models\Notebook;

class ToolService
{

    public static function getClasses(): Array {

        return [
            Phone::class => 'Mobiltelefon', 
            Notebook::class => 'Laptop'
        ];
    }

    public static function displayableName($className): String{

         return ToolService::getClasses()[$className];

    }
}