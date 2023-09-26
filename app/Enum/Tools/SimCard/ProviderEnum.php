<?php

namespace App\Enum\Tools\SimCard;

enum ProviderEnum: int
{
    case VODAFONE = 1;
    case TELEKOM = 2;
    case YETTEL = 3;

    public function getReadableText(): string
    {
        return match($this){
            self::VODAFONE => __('sim_card.vodafone'),
            self::TELEKOM => __('sim_card.telekom'),
            self::YETTEL => __('sim_card.yettel'),
        };
    }
}
