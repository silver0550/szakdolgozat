<?php

namespace App\Providers;

use App\Models\Display;
use App\Models\Notebook;
use App\Models\Phone;
use App\Models\Printer;
use App\Models\SimCard;
use App\Observers\BaseToolObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $observers = [
        Phone::class => [BaseToolObserver::class],
        Notebook::class => [BaseToolObserver::class],
        Display::class => [BaseToolObserver::class],
        Printer::class => [BaseToolObserver::class],
        SimCard::class => [BaseToolObserver::class],
    ];

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        //
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
