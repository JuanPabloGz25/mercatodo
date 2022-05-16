<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Products\Products;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsImportController extends Controller
{
    public function index()
    {
        return view('imports.products');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ProductsImport, $file);

        return redirect('catalogo');
    }
}
