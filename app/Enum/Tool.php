<?php

namespace App\Enum;

enum Tool: string
{

    case PHONE = 'Mobiltelefon';
    case NOTEBOOK = 'Laptop';

    public static function getName(String $className){
        switch ($className){
            case ('Phone'): return Tool::PHONE; break;
            case ('Notebook'): return Tool::NOTEBOOK; break;
            default: return '';
        }
    }
}