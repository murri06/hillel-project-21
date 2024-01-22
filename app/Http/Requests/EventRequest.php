<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'string'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'notes' => ['required', 'min:3'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
        ];
    }
}
