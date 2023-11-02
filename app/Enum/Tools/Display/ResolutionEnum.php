<?php

namespace App\Enum\Tools\Display;

enum ResolutionEnum: int
{
    case HD = 1;
    case FULL_HD = 2;
    case FOUR_K = 3;
    case EIGHT_K = 4;

    public function getReadableText(): string
    {
        return match($this){
            self::HD => 'HD',
            self::FULL_HD => 'Full HD',
            self::FOUR_K => '4K',
            self::EIGHT_K => '8K',
        };
    }

    public function getResolution(): string
    {
        return match($this){
            self::HD => '1280x720',
            self::FULL_HD => '1920x1080',
            self::FOUR_K => '3840x2160',
            self::EIGHT_K => '7680x4320',
        };
    }
}
