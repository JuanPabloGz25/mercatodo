<?php

namespace App\Http\Controllers\Exports;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductsExportController extends Controller
{
    public function index(): View
    {
        return view('exports.exports');
    }

    public function export(Request $request): View
    {
        (new ProductsExport)
            ->forBrand($request->query('brand'))
            ->forStartDate($request->query('startDate'))
            ->forEndDate($request->query('endDate'))
            ->store('ZenithProducts.xlsx','public');

        Log::info('Export' . 'Se Ha Hecho un Exporte de Productos ' , [
            'user' => auth()->user()->email,
            'date' => Carbon::now(),
        ]);

        return view('exports.exports');
    }
}
