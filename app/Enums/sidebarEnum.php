<?php

namespace App\Enums;

enum sidebarEnum: string
{
    //pages
    case PAGE_SELF = 'selfpage';
    case PAGE_AUDIT = 'audit';
    case PAGE_DASHBOARD = 'dashboard';
    case PAGE_SEARCH = 'search';
    case PAGE_LOGOUT = 'logout';

    //icons

    case ICON_HOME = 'icon-home';
    case ICON_EXIT = 'icon-exit';
    case ICON_SEARCH = 'icon-search';

    //Name

    case NAME_DASHBOARD = 'Dashboard';
    case NAME_SEARCH = 'Keresés';
    case NAME_EXIT = 'Kilépés';
    case NAME_SELF = 'Saját adatok';
    case NAME_STATEMENT = 'Kimutatás';
    case NAME_STAT = 'Statisztika';

}