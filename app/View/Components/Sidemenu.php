<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class Sidemenu extends Component
{
    public function isActive(...$patterns): bool
    {
        return Route::currentRouteNamed($patterns);
    }

    public function render(): View
    {
        return view('components.sidemenu');
    }
}
