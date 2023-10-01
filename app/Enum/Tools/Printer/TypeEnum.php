<?php

namespace App\Enum\Tools\Printer;

enum TypeEnum: int
{
    case LASER = 1;
    case INK_JET = 2;

    public function getReadableText(): string
    {
        return match($this){
            self::LASER => __('printer.laser'),
            self::INK_JET => __('printer.inkjet'),
        };
    }
}
