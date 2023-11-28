<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SimCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => [
                'required',
                Rule::unique('sim_cards')->ignore($updatedId)
            ],
            'call_number' => [
                'required',
                Rule::unique('sim_cards')->ignore($updatedId),
                'regex:/^06(30|70|20)\d{5}$/',
            ],
            'provider' => [
                'required',
                'int'
            ],
            'size' => [
                'required',
                'int'
            ],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('sim_card.serial_number'),
                'call_number' => __('sim_card.call_number'),
                'provider' => __('sim_card.provider'),
                'size' => __('sim_card.size'),
                'description' => __('sim_card.description'),
            ];
    }
}
