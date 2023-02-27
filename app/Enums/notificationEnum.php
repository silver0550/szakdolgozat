<?php

namespace App\Enums;

enum notificationEnum: string
{
    //modals notifications
    case OPERATION_SUCCES = 'Sikeres művelet!';
    case OPERATION_FAILD = 'A kért művelet nem hajtható végre!';
    case DELETE_SUCCES = 'Az elem törlése az adatbázisból megtörtént!';
    case CREATE_SUCCES = 'Az elem hozzáadása az adatbázishoz megtörtént!';

}