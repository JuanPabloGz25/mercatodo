<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','min:2', 'max:100'],
            'lastname' => ['required','min:2', 'max:100'],
            'document' => ['required','min:8', 'max:20','unique:users,document'],
            'phone' => ['required', 'min:7', 'max:10'],
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','same:confirm-password'],
        ];
    }
}
