<?php

namespace App\Providers;

use App\Http\Requests\DisplayRequest;
use App\Http\Requests\NotebookRequest;
use App\Http\Requests\PhoneRequest;
use App\Http\Requests\PrinterRequest;
use App\Http\Requests\SimCardRequest;
use App\Http\Requests\TabletRequest;
use App\Http\Requests\WorkStationRequest;
use App\Models\Display;
use App\Models\Notebook;
use App\Models\Phone;
use App\Models\Printer;
use App\Models\SimCard;
use App\Models\Tablet;
use App\Models\WorkStation;

class ClassRequestProvider
{
    public static function get($class): string
    {
        return match ($class) {
            Phone::class => PhoneRequest::class,
            Notebook::class => NotebookRequest::class,
            Display::class => DisplayRequest::class,
            Printer::class => PrinterRequest::class,
            SimCard::class => SimCardRequest::class,
            Tablet::class => TabletRequest::class,
            WorkStation::class => WorkStationRequest::class,
            default => null,
        };

    }
}
