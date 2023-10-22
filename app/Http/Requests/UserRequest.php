<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'user.name' => ['required'],
            'user.email' => ['required','email'],
            'property.department' => ['required','not_in:Válasszon'],
            'property.place_of_birth' => ['required'],
            'property.date_of_birth' => ['required','date','before:today'],
            'property.entry_card' => ['required','digits:6'],
        ];

//        return [
//            'serial_number' => ['required', 'digits:12', Rule::unique('phones')->ignore($updatedId)],
//            'manufacturer' => ['required'],
//            'model_type' => ['required'],
//            'description' => ['nullable'],
//        ];
    }
}
