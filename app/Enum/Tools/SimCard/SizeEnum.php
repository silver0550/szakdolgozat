<?php

namespace App\Enum\Tools\SimCard;

enum SizeEnum: int
{
    case FULL_SIZE = 1;
    case MINI = 2;
    case MICRO = 3;

    public function getReadableText(): string
    {
        return match($this){
            self::FULL_SIZE => __('sim_card.full_size'),
            self::MINI => __('sim_card.mini'),
            self::MICRO => __('sim_card.micro'),
        };
    }
}
