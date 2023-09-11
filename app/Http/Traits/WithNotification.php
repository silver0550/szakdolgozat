<?php

namespace App\Http\Traits;

use App\View\AlertBuilder;

trait WithNotification
{

    public function alertSuccess($content){

        $alertContent = AlertBuilder::alert()->success($content)->get();
        $this->dispatchBrowserEvent('showAlert', $alertContent);
    }

    public function alertError($content){

        $alertContent = AlertBuilder::alert()->error($content)->get();
        $this->dispatchBrowserEvent('showAlert', $alertContent);
    }

    public function alertWarning($content){

        $alertContent = AlertBuilder::alert()->warning($content)->get();
        $this->dispatchBrowserEvent('showAlert', $alertContent);
    }
}