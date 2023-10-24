<?php

namespace App\Enum;

use App\Http\Livewire\ToolView\Display;
use App\Models\Notebook;
use App\Models\Phone;
use App\Models\Printer;
use App\Models\SimCard;
use App\Models\Tablet;
use App\Models\User;
use App\Models\WorkStation;

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

    case AUTH = 'storage/defaults/auth.png';

    public static function getImgByType(?string $type): ?string
    {
        return match($type){
            User::class => self::DEFAULT_AVATAR->value,
            Phone::class => self::PHONE->value,
            Notebook::class => self::NOTEBOOK->value,
            Display::class => self::DISPLAY->value,
            WorkStation::class => self::WORK_STATION->value,
            SimCard::class => self::SIM_CARD->value,
            Tablet::class => self::TABLET->value,
            Printer::class => self::PRINTER->value,
            'auth' => self::AUTH->value,
            default => null,
        };
    }
}
