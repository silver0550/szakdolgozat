<?php

namespace App\Providers;

use App\Http\Requests\DisplayRequest;
use App\Http\Requests\NotebookRequest;
use App\Http\Requests\PhoneRequest;
use App\Http\Requests\PrinterRequest;
use App\Models\Display;
use App\Models\Notebook;
use App\Models\Phone;
use App\Models\Printer;

class ClassRequestProvider
{
    public static function get($class): string
    {
        return match($class){
            Phone::class => PhoneRequest::class,
            Notebook::class => NotebookRequest::class,
            Display::class => DisplayRequest::class,
            Printer::class => PrinterRequest::class,
            default => null,
        };

    }
}
