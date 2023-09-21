<?php

namespace App\Providers;

use App\Http\Requests\NotebookRequest;
use App\Http\Requests\PhoneRequest;
use App\Models\Notebook;
use App\Models\Phone;
use Illuminate\Foundation\Http\FormRequest;

class ClassRequestProvider
{
    public static function get($class): string
    {
        return match($class){
            Phone::class => PhoneRequest::class,
            Notebook::class => NotebookRequest::class
        };

    }
}
