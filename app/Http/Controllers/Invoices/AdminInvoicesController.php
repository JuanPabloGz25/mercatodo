<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Remittances\Remittance;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function view;

class AdminInvoicesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-historial')->only('index');
    }

    public function index(Request $request): View
    {
        $remittances = Remittance::paginate(10);
        return view('adminInvoices.index', compact('remittances'));
    }
}
