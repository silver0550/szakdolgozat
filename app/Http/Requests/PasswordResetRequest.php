<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'email' => ['required'],
            'dateOfBirth' => ['required'],
            'entryCard' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => __('password_reset.email'),
            'dateOfBirth' => __('password_reset.date_of_birth'),
            'entryCard' => __('password_reset.entry_card'),
        ];
    }
}
