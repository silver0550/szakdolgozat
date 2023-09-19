<?php

namespace App\Enum;

enum PictureProviderEnum: string
{
    case DEFAULT_AVATAR = 'storage/defaults/avatar.jpg';
    case PHONE = 'storage/defaults/smart_phone.png';
    case NOTEBOOK = 'storage/defaults/notebook.png';
}
