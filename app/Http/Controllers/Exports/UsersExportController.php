<?php

namespace App\Http\Controllers\Exports;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyWhenTheExportBeCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UsersExportController extends Controller
{
    public function index(): View
    {
        return view('exports.exports');
    }

    public function export(Request $request): View
    {
        $user = auth()->user();
        $filePath = asset('storage/ZenithUsers.xlsx');

        (new UsersExport)
            ->forGender($request->query('gender'))
            ->forStartDate($request->query('startDate'))
            ->forEndDate($request->query('endDate'))
            ->store('ZenithUsers.xlsx','public')->chain([
                new NotifyWhenTheExportBeCompleted($user, $filePath)
            ]);

        Log::info('Export ' . 'Se Ha Hecho un Exporte de Usuarios ' , [
            'user' => auth()->user()->email,
            'date' => Carbon::now(),
        ]);

        return view('exports.exports');
    }
}
