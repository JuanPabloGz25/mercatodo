<?php

namespace App\Http\Requests\Products;

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
            'category' => ['required'],
            'brand' => ['required'],
            'line' => ['required'],
            'model' => ['required'],
            'color' => ['required'],
            'transmission' => ['required'],
            'kilometre' => ['required'],
            'engine' => ['required'],
            'fuel' => ['required'],
            'torque' => ['required'],
            'power' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'description' => ['required'],
        ];
    }
}
