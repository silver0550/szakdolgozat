<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotebookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => ['required', Rule::unique('notebooks')->ignore($updatedId)],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('notebook.serial_number'),
                'manufacturer' => __('notebook.manufacturer'),
                'model_type' => __('notebook.model_type'),
                'description' => __('notebook.description'),
            ];
    }
}
