<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Products;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use function now;
use function request;
use function view;

class VitrinaController extends Controller
{
    public function vitrina (): View
    {
        $products = Products::search()
            ->when(request()->filled('brand'), function ($query) {
                $query->where('brand', request('brand'));
            })
            ->when(request()->filled('category'), function ($query) {
                $query->where('category', request('category'));
            })
            ->when(request()->filled('color'), function ($query) {
                $query->where('color', request('color'));
            })
            ->when(request()->filled('model'), function ($query) {
                $query->where('model', request('model'));
            })
            ->when(request()->filled('transmission'), function ($query) {
                $query->where('transmission', request('transmission'));
            })
            ->when(request()->filled('fuel'), function ($query) {
                $query->where('fuel', request('fuel'));
            })
            ->where('status','enable')->paginate(6)->withQueryString();

        $filters = Cache::remember('filters', now()->addHour(), function () {
            return Products::toBase()->select(['category','brand','model','color','transmission','fuel'])->distinct()->get();
        });

        return view('vitrina.index',compact('products','filters'));
    }
}
