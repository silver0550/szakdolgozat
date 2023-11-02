<?php

namespace App\Providers;

use App\Interfaces\AssignmentServiceInterface;
use App\Interfaces\HistoryInterface;
use App\Interfaces\RoleServiceInterface;
use App\Interfaces\ToolServiceInterface;
use App\Interfaces\UserServiceInterface;
use App\Service\AssignmentService;
use App\Service\HistoryService;
use App\Service\RoleService;
use App\Service\ToolService;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $services = [
        UserServiceInterface::class => UserService::class,
        ToolServiceInterface::class => ToolService::class,
        RoleServiceInterface::class =>RoleService::class,
        AssignmentServiceInterface::class => AssignmentService::class,
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
