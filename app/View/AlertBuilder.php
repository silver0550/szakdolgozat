<?php

namespace App\View;

class AlertBuilder 
{
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const ERROR = 'error';
    const INFORMATION = 'info';


    private $text;
    private $heading;
    private $icon;

    public static function alert(): AlertBuilder
    {
        return new AlertBuilder();
    }
    
    public function success($text): self
    {
        $this->icon = self::SUCCESS;
        $this->heading = __('alert.heading_success');
        $this->text = $text;

        return $this;
    }

    public function warning($text): self
    {
        $this->icon = self::WARNING;
        $this->heading = __('alert.heading_warning');
        $this->text = $text;

        return $this;
    }

    public function error($text): self
    {
        $this->icon = self::ERROR;
        $this->heading = __('alert.heading_error');
        $this->text = $text;

        return $this;
    }

    public function info($text): self
    {
        $this->icon = self::INFORMATION;
        $this->heading = __('alert.heading_info');
        $this->text = $text;

        return $this;
    }
    public function natural($text): self
    {
        $this->text = $text;

        return $this;
    }

    public function get(): array
    {
        return [
            'message' => $this->text,
            'heading' => $this->heading,
            'icon' => $this->icon,
        ];
    }
}