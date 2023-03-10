<?php

namespace App\Enum;

enum LanguageKnowledge: string
{
    
    case EN = 'Angol';
    case DE = 'Német';
    case FR = 'Francia';
    case RUS = 'Orosz';

    public static function getLevels(): array
    {
        return [
            'alapfok',
            'középfok',
            'felsőfok',
        ];
    }
}