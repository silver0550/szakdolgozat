<?php

namespace App\Enum;

enum Notification: string
{
    case OPERATION_SUCCESS = 'Sikeres művelet!';
    case OPERATION_FAILD = 'Sikertelen Művelet!';
    case OPERATION_DENIED = 'Nem jogosult a művelet végrehajtására!';

    case DELETE_SUCCESS = 'Az elem törlése az adatbázisból megtörtént!';
    case CREATE_SUCCESS= 'Az elem hozzáadása az adatbázishoz megtörtént!';
    case UPDATE_SUCCESS = 'Az elem frissítése megtörtént!';
    
    case PASSWORD_RESET_SUCCESS = 'A jelszavak visszáaállítása megtörtént!';
    case PASSWORD_RESET_REQUEST_SUCCES = 'A kérést továbítottuk az adminok irányába!';
    case PASSWORD_RESET_REQUEST_FAILD ='A megadott adatok nem felelnek meg a valóságnak, vegye fel a kapcsolatot a rendszergazdával!';

}