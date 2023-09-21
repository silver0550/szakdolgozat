<?php

namespace App\Enum;

enum ToolsEnum: int
{
    case PHONE = 1;
    case NOTEBOOK = 2;
    case DISPLAY = 3;
    case WORK_STATION = 4;
    case SIM_CARD = 5;
    case TABLET = 6;
    case PRINTER = 7;

    public function getReadableText(): string
    {
        return match ($this){
            self::PHONE => __('phone.phone'),
            self::NOTEBOOK => 'Laptop',
            self::DISPLAY => 'Monitor',
            self::WORK_STATION => 'Munka állomás',
            self::SIM_CARD => 'Sim kártya',
            self::TABLET => 'Tablet',
            self::PRINTER => 'Nyomtató',
        };
    }
}
