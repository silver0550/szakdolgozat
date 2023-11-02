<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => ['required', 'digits:12', Rule::unique('phones')->ignore($updatedId)],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('phone.serial_number'),
                'manufacturer' => __('phone.manufacturer'),
                'model_type' => __('phone.model_type'),
                'description' => __('phone.description'),
            ];
    }

}
