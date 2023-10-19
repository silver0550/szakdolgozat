<?php

namespace App\Providers;

use App\Interfaces\HistoryInterface;
use App\Interfaces\RoleServiceInterface;
use App\Service\HistoryService;
use App\Service\RoleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $services = [
        RoleServiceInterface::class =>RoleService::class,
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
