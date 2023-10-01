<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TabletRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => ['required', Rule::unique('tablets')->ignore($updatedId)],
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
