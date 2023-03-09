<?php

namespace App\Enum;

enum Department: string
{
    
    case MARKETING = 'Marketing';
    case DEVELOPMENT = 'Fejlesztés';
    case PRODUCTION = 'Gyártás';
    case SALES = 'Értékesítés';
}