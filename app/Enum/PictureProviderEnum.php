<?php

namespace App\Enum;

enum PictureProviderEnum: string
{
    case DEFAULT_AVATAR = 'storage/defaults/avatar.jpg';
    case PHONE = 'storage/defaults/smart_phone.png';
    case NOTEBOOK = 'storage/defaults/notebook.png';
    case DISPLAY = 'storage/defaults/display.png';
    case WORK_STATION = 'storage/defaults/work_station.png';
    case SIM_CARD = 'storage/defaults/sim_card.png';
    case TABLET = 'storage/defaults/tablet.png';
    case PRINTER = 'storage/defaults/printer.png';
}
