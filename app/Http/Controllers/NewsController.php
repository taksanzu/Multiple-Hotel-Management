<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $type = $request->type;
            $news = News::where('deleted', 0)->where('type',$type)->paginate(12);
            $user = Auth::user();
            $search = $request->search;
            if ($search != null) {
                $news = News::where('title', 'like', '%' . $search . '%')->where('deleted', 0)->where('type', $type)->paginate(12);
            }
            return view('pages.news.tintuc', ['news' => $news, 'user' => $user, 'type' => $type]);
        } else {
            return redirect()->route('login');
        }
    }

    function paginationAjax(Request $request)
    {
        if ($request->ajax()) {
            $news = News::where('deleted', 0)->where('type',$request->type)->paginate(12);
            return view('pages.news.newsTable', ['news' => $news])->render();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'contents' => 'nullable',
            'type' => 'nullable',
            'created_by' => 'nullable',
            'updated_by' => 'nullable'
        ]);
        $id = $request->id;
        if ($id) {
            $news = News::findOrFail($id);
            $news->update([
                'title' => $request->title,
                'description' => $request->description,
                'contents' => $request->contents,
                'type' => $request->type,
                'updated_by' => Auth::user()->id,
            ]);
        } else {
            News::create([
                'title' => $request->title,
                'description' => $request->description,
                'contents' => $request->contents,
                'type' => $request->type,
                'created_by' => Auth::user()->id,
                'updated_by' => null,
            ]);
        }

        return redirect()->route('news', ['type' => $request->type]);
    }
    public function getNews(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        return response()->json(['news' => $news]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        $news->update([
            'deleted' => 1
        ]);
    }
}
