<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'content' => ['required'],
            'author' => ['required'],
            'date' => ['required'],
            'category' => ['required'],
        ];
    }
}
