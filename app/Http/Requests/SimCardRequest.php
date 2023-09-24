<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'serial_number' => ['required', 'unique'],
            'provider' => ['required','int'],
            'size' => ['required', 'int'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('sim_card.serial_number'),
                'provider' => __('sim_card.provider'),
                'size' => __('sim_card.size'),
                'description' => __('sim_card.description'),
            ];
    }
}
