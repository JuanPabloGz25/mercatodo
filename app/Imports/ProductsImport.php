<?php

namespace App\Imports;

use App\Models\Products\Products;
use App\Rules\Products\ExcelProductsRules;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, WithUpserts
{
    public function model(array $row)
    {
        return new Products([
            'code' => $row['code'],
            'category' => $row['category'],
            'brand' => $row['brand'],
            'line' => $row['line'],
            'model' => $row['model'],
            'color' => $row['color'],
            'transmission' => $row['transmission'],
            'kilometre' => $row['kilometre'],
            'engine' => $row['engine'],
            'fuel' => $row['fuel'],
            'torque' => $row['torque'],
            'power' => $row['power'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'description' => $row['description'],
            'status' => $row['status'],
        ]);
    }

    public function rules(): array
    {
        return ExcelProductsRules::rules();
    }

    public function uniqueBy()
    {
        return 'line';
    }
}
