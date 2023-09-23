<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisplayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'serial_number' => ['required', 'unique'],
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
