<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MainNewsController extends Controller
{
    public function index()
    {
        $news = News::where('deleted', 0)->where('type', 1)->paginate(6);
        return view('mainpages.pages.tintuc.index', ['news' => $news]);
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        return view('mainpages.pages.tintuc.details', ['news' => $news]);
    }
}
