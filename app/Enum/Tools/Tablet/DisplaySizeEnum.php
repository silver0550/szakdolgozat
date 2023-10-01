<?php

namespace App\Enum\Tools\Tablet;

enum DisplaySizeEnum: int
{
    case COL_7 = 1;
    case COL_8 = 2;
    case COL_9 = 3;
    case COL_10 = 4;
    case COL_11 = 5;
    case COL_12 = 6;

    public function getReadableText(): string
    {
        return match ($this) {
            self::COL_7 => '7"',
            self::COL_8 => '8"',
            self::COL_9 => '9"',
            self::COL_10 => '10"',
            self::COL_11 => '11"',
            self::COL_12 => '12"',
        };
    }
}
