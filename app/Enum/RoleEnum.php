<?php

namespace App\Enum;

enum RoleEnum: int
{
    case SYSTEM = 1;
    case ADMIN = 2;
    case LEADER = 3;
    case USER = 4;
}
