<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function redirect;
use function view;

class NewsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-noticias|crear-noticias|editar-noticias|borrar-noticias')->only('index');
        $this->middleware('permission:crear-noticias', ['only' => ['create','store']]);
        $this->middleware('permission:editar-noticias', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-noticias', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $news = News::paginate(6);
        return view('news.index',compact('news',));
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $news = $request->all();
        if($image = $request->file('image')) {
            $routeSaveImg = 'image/';
            $imageProduct = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImg, $imageProduct);
            $news['image'] = "$imageProduct";
        }

        News::create($news);
        return redirect()->route('news.index');
    }

    public function show($id): View
    {
        $new = News::find($id);
        return view('news.show',compact('new',));
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $new = $request->all();
        if($image = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imageProduct = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($rutaGuardarImg, $imageProduct);
            $new['image'] = "$imageProduct";
        }else{
            unset($new['image']);
        }
        $news->update($new);

        return redirect()->route('news.index');
    }

    public function destroy($id): RedirectResponse
    {
        News::find($id)->delete();
        return redirect()->route('news.index');
    }
}
