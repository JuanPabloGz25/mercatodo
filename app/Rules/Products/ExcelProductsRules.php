<?php

namespace App\Rules\Products;

use Illuminate\Validation\Rule;

class ExcelProductsRules
{
    public static function rules(): array
    {
        return [
            'code' => ['required','min:5', 'max:6'],
            'category' => ['required', Rule::in(['Nuevo', 'Usado', 'Importación'])],
            'brand' => ['required'],
            'line' => ['required'],
            'model' => ['required', 'max:5'],
            'color' => ['required'],
            'transmission' => ['required', Rule::in(['Mecánico', 'Automático', 'Triptónico'])],
            'kilometre' => ['required'],
            'engine' => ['required'],
            'fuel' => ['required', Rule::in(['Corriente', 'Extra', 'Diesel', 'Eléctrico'])],
            'torque' => ['required'],
            'power' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'description' => ['required', 'min:10'],
        ];
    }
}
