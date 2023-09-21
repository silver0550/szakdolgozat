<?php

namespace App\Enum;

enum StatusEnum: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;

    public function getReadableText(): string
    {
        return match ($this){
            self::ACTIVE => __('status.active'),
            self::INACTIVE => __('status.inactive'),
        };
    }
}
