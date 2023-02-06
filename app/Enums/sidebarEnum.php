<?php

namespace App\Enums;

enum sidebarEnum: string
{
    case SELF = 'selfpage';
    case AUDIT = 'audit';
    case DASHBOARD = 'dashboard';
    case SEARCH = 'search';
    case LOGOUT = 'logout';
}