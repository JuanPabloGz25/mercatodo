<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'document' => 'required',
            'phone' => 'required',
            'password' => 'same:confirm-password',
        ];
    }
}
