<?php

namespace App\Http\Traits;

use App\Enum\Notification;

trait WithNotification
{

    public function sendSuccessResponse($content){

        $this->dispatchBrowserEvent('success', ['title' => Notification::OPERATION_SUCCESS, 'content' => $content]);

    }

    public function sendFaildResponse($content){

        $this->dispatchBrowserEvent('faild', ['title' => Notification::OPERATION_FAILD, 'content' => $content]);

    }
}