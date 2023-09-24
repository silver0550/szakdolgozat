<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'serial_number' => ['required','unique:notebooks'],
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
