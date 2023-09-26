<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TabletRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'serial_number' => ['required','unique:tablets'],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'display_size' =>['required','int'],
            'color' => ['nullable','int'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('tablet.serial_number'),
                'manufacturer' => __('tablet.manufacturer'),
                'model_type' => __('tablet.model_type'),
                'display_size' => __('tablet.display_size'),
                'color' => __('tablet.color'),
                'description' => __('tablet.description'),
            ];
    }
}
