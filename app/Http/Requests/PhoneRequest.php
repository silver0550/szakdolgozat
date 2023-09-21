<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'imei' => ['required', 'digits:12'],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'imei' => __('phone.imei'),
                'manufacturer' => __('phone.manufacturer'),
                'model_type' => __('phone.model_type'),
                'description' => __('phone.description'),
            ];
    }

}
