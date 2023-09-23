<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrinterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'serial_number' => ['required', 'unique'],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'description' => ['nullable'],
            'is_colorful' => ['nullable', 'boolean'],
            'type' => ['nullable', 'int'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('printer.serial_number'),
                'manufacturer' => __('printer.manufacturer'),
                'model_type' => __('printer.model_type'),
                'description' => __('printer.description'),
                'is_colorful' => __('printer.is_colorful'),
                'type' => __('printer.type'),
            ];
    }
}
