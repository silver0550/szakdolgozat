<?php

namespace App\Enum;

enum ColorEnum: int
{
    case BLACK = 1;
    case WHITE = 2;
    case BLUE = 3;
    case GREEN = 4;
    case YELLOW = 5;
    case GRAY = 6;

    public function getReadableText(): string
    {
        return match($this){
            self::BLACK => __('global.black'),
            self::WHITE => __('global.white'),
            self::BLUE => __('global.blue'),
            self::GREEN => __('global.green'),
            self::YELLOW => __('global.yellow'),
            self::GRAY => __('global.gray'),
        };
    }
}
