<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $news = News::where('deleted', 0)->get();
            $user = Auth::user();
            return view('pages.news.tintuc', ['news' => $news], ['user' => $user]);
        } else {
            // Người dùng chưa đăng nhập, bạn có thể thực hiện xử lý khác ở đây
            return redirect()->route('login');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'contents' => 'nullable',
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
                'updated_by' => Auth::user()->id,
            ]);
        } else {
            News::create([
                'title' => $request->title,
                'description' => $request->description,
                'contents' => $request->contents,
                'created_by' => Auth::user()->id,
                'updated_by' => null,
            ]);
        }

        return redirect()->route('news');
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
