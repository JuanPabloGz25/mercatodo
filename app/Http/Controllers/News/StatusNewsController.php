<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\RedirectResponse;
use function redirect;

class StatusNewsController extends Controller
{
    public function update($id): RedirectResponse
    {
        $new = News::find($id);

        if ($new->status == 'enable'){
            $new->status = 'disable';
        }else{
            $new->status = 'enable';
        }
        $new->save();
        return redirect()->route('news.index');
    }
}
