<?php

namespace App\Enums;

enum DepartmentEnum: string
{
    
    case MARCETING = 'Marketing';
    case DEVELOPMENT = 'Development';
    case PRODUCTION = 'Production';
    case SALES = 'Sales';
}