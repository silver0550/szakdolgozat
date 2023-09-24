<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    function user(): ?User {
        return Auth::user();
    }
}

if (!function_exists('user_id')) {
    function user_id(): ?int
    {
        return Auth::user()?->id;
    }
}

if (!function_exists('lineLifter')) {
    function lineLifter(string $text): string {

        if (str_contains($text, '_')) {
            return str_replace('_', '-', $text);
        }

        return $text;
    }
}
