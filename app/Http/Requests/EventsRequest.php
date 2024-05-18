<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
            'image'         => ['required'],
            'course'        => ['required', 'string', 'max:35'],
            'date'          => ['required', 'string', 'max:30'],
            'duration'      => ['required', 'string', 'max:30'],
            'price'         => ['required', 'integer'],
        ];
    }
}
