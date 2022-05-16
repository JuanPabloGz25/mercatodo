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
            'code' => ['filled'],
            'category' => ['filled'],
            'brand' => ['filled','string','max:50'],
            'line' => ['filled'],
            'model' => ['filled'],
            'color' => ['filled'],
            'transmission' => ['filled'],
            'kilometre' => ['filled'],
            'engine' => ['filled'],
            'fuel' => ['filled'],
            'torque' => ['filled'],
            'power' => ['filled'],
            'price' => ['filled'],
            'stock' => ['filled'],
            'description' => ['filled'],
        ];
    }
}
