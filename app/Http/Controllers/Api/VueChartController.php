<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsVisit;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VueChartController extends Controller
{
    public function barChart(): JsonResponse
    {
        $values = NewsVisit::select('new_id', DB::raw('count(*) as total'))->groupBy('new_id')
            ->get()
            ->toArray();

        return response()->json([
            'data' => Arr::pluck($values, 'total', 'new_id')
        ]);
    }
}
