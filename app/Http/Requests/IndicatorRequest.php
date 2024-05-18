<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "happy_students"     => ['required', 'integer'],
            "course_hours"     => ['required', 'integer'],
            "employed_students"     => ['required', 'integer'],
            "years_experience"     => ['required', 'integer'],
        ];
    }
}
