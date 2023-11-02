<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkStationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(?int $updatedId = null): array
    {
        return [
            'serial_number' => ['required',Rule::unique('work_stations')->ignore($updatedId)],
            'manufacturer' => ['required'],
            'model_type' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return
            [
                'serial_number' => __('work_station.serial_number'),
                'manufacturer' => __('work_station.manufacturer'),
                'model_type' => __('work_station.model_type'),
                'description' => __('work_station.description'),
            ];
    }
}
