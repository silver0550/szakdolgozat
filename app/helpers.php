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

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phoneNumber): ?string
    {
        $cleanedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        if (strlen($cleanedNumber) == 11) {
            $areaCode = substr($cleanedNumber, 0, 2);

            $firstPart = substr($cleanedNumber, 2, 2);
            $secondPart = substr($cleanedNumber, 4);

            return $areaCode . ' ' . $firstPart . ' ' . $secondPart;
        } else {
            return null;
        }
    }
}

if (!function_exists('lineLifter')) {
    function lineLifter(string $text, bool $up = true): string {

        if (str_contains($text, '_') || str_contains($text, '-')) {

            if($up){
                return str_replace('_', '-', $text);
            } else {

                return str_replace('-', '_', $text);
            }
        }

        return $text;
    }
}
