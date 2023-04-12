<?php

namespace App\View\Components;

use App\Filters\Builder\Active;
use Illuminate\View\Component;
use App\Models\PasswordReset;
use Illuminate\Pipeline\Pipeline;

class Navbar extends Component
{

    public $notification;
    public $pwResetRequest;
    public $userId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pwResetRequest = count((new Pipeline(app()))->send(PasswordReset::query())->through(Active::class)->thenReturn()->get()); 
        $this->notification = $this->pwResetRequest;
        $this->userId = auth()->user()->id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
