<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->id)],
            'password' => ['required', 'min:6'],
        ];
    }
}
