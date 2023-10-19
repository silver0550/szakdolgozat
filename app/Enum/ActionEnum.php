<?php

namespace App\Enum;

enum ActionEnum: string
{
    case CREATE = 'created';
    case UPDATE = 'updated';
    case DELETE = 'deleted';
    case LOG_IN = 'login';
    case LOG_OUT = 'logout';

    public function getReadableText(): string
    {
        return match($this) {
            self::CREATE => __('action.create'),
            self::UPDATE => __('action.update'),
            self::DELETE => __('action.delete'),
            self::LOG_IN => __('action.sing_in'),
            self::LOG_OUT => __('action.sing_out'),
        };
    }
}
