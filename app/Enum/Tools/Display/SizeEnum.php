<?php

namespace App\Enum\Tools\Display;

enum SizeEnum: int
{
    case Col_19 = 1;
    case COL_20 = 2;
    case COL_21 = 3;
    case COL_22 = 4;
    case COL_23 = 5;
    case COL_24 = 6;
    case COL_25 = 7;
    case COL_26 = 8;

    public function getReadableText(): string
    {
        return match($this){
            self::Col_19 => '19"',
            self::COL_20 => '20"',
            self::COL_21 => '21"',
            self::COL_22 => '22"',
            self::COL_23 => '23"',
            self::COL_24 => '24"',
            self::COL_25 => '25"',
            self::COL_26 => '26"',
        };
    }
}
