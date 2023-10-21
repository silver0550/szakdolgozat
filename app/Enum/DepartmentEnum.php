<?php

namespace App\Enum;

enum DepartmentEnum: int
{
    case MARKETING = 1;
    case DEVELOPMENT = 2;
    case PRODUCTION = 3;
    case SALES = 4;

    public function getReadableText(): string
    {
        return match($this){
            self::MARKETING => __('department.marketing'),
            self::DEVELOPMENT => __('department.development'),
            self::PRODUCTION => __('department.production'),
            self::SALES => __('department.sales'),
        };
    }
}
