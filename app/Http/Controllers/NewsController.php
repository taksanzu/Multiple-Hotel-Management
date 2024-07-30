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
            $user = Auth::user();
            if($user->roles == 0){
                $news = News::where('deleted', 0)->where('type', $type)->orderBy('id','desc')->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $news = News::where('title', 'like', '%' . $search . '%')->where('deleted', 0)->where('type', $type)->paginate(12);
                }
            } else {
                $news = News::where('deleted', 0)->where('type', $type)->where('created_by', Auth::id())->orderBy('id','desc')->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $news = News::where('title', 'like', '%' . $search . '%')->where('deleted', 0)->where('type', $type)->where('created_by', Auth::id())->paginate(12);
                }
            }
            return view('pages.news.tintuc', ['news' => $news, 'user' => $user, 'type' => $type]);
        } else {
            return redirect()->route('login');
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
            'updated_by' => 'nullable',
            'videolink' => 'nullable',
            'link360' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $id = $request->id;
        if ($id) {
            $news = News::findOrFail($id);
            $images = $request->file('imageNews');
            if ($images) {
                $imagesName = $images->getClientOriginalName();
                $path = $images->move(public_path() . '/images/news/mainnews/', $imagesName);
                $news->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'contents' => $request->contents,
                    'type' => $request->type,
                    'slug' => ChangeToSlug($request->title),
                    'videolink' => $request->videolink,
                    'link360' => $request->link360,
                    'updated_by' => Auth::user()->id,
                    'images' => $imagesName,
                ]);
            } else {
                $news->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'contents' => $request->contents,
                    'type' => $request->type,
                    'slug' => ChangeToSlug($request->title),
                    'videolink' => $request->videolink,
                    'link360' => $request->link360,
                    'updated_by' => Auth::user()->id,
                ]);
            }
        } else {
            $images = $request->file('imageNews');
            $imagesName = $images->getClientOriginalName();
            $path = $images->move(public_path() . '/images/news/mainnews/', $imagesName);
            News::create([
                'title' => $request->title,
                'description' => $request->description,
                'contents' => $request->contents,
                'type' => $request->type,
                'slug' => ChangeToSlug($request->title),
                'videolink' => $request->videolink,
                'link360' => $request->link360,
                'created_by' => Auth::user()->id,
                'updated_by' => null,
                'images' => $imagesName,
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

    public function postNews(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        if ($news->status == 0) {
            $news->update([
                'status' => 1
            ]);
        } else {
            $news->update([
                'status' => 0
            ]);
        }
    }
}
