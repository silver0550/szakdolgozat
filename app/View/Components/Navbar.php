<?php

namespace App\View\Components;

use App\Filters\Active;
use Illuminate\View\Component;
use App\Models\PasswordReset;
use Illuminate\Pipeline\Pipeline;

class Navbar extends Component
{

    public $notification;
    public $pwResetRequest;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pwResetRequest = count((new Pipeline(app()))->send(PasswordReset::query())->through(Active::class)->thenReturn()->get()); 
        $this->notification = $this->pwResetRequest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar', [
            'notification' => $this->notification,
            'password' => $this->pwResetRequest,
    ]);
    }
}
