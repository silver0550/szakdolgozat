<?php

namespace App\Providers;

use App\Interfaces\HistoryInterface;
use App\Service\HistoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $services = [
        HistoryInterface::class => HistoryService::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
