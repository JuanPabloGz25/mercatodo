<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\View\View;
use function view;

class CurrentlyNewsController extends Controller
{
    public function currently (): View
    {
        $news = News::paginate(6);
        return view('currently.index',compact('news'));
    }
}
