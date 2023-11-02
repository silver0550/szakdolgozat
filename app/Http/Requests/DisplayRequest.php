<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DisplayRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => ['required', Rule::unique('displays')->ignore($updatedId)],
            'manufacturer' => ['required','string'],
            'model_type' => ['required','string'],
            'size' => ['nullable', 'int'],
            'resolution' => ['nullable', 'int'],
            'is_flexible' => ['nullable','boolean'],
            'description' =>['nullable','string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'serial_number' =>__('display.serial_number'),
            'manufacturer' => __('display.manufacturer'),
            'model_type' => __('display.model_type'),
            'size' => __('display.size'),
            'resolution' => __('display.resolution'),
            'is_flexible' => __('display.is_flexible'),
            'description' => __('display.description'),
        ];
    }
}
