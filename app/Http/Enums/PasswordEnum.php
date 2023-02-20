<?php

namespace App\Http\Enums;

enum PasswordEnum : string 
{
    case DEFAULT_PASSWORD = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password
    case SUPER_ADMIN = 'super@admin.com';
}