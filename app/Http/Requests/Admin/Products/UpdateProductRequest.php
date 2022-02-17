<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required'],
            'marca' => ['required'],
            'linea' => ['required'],
            'especificaciones' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
        ];
    }
}
