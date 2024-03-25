<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class MainNewsController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $news = News::where('deleted', 0)->where('type', 1)->where('status', 1)->where('created_by', $user)->paginate(6);
        return view('mainpages.pages.tintuc.index', ['news' => $news]);
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        return view('mainpages.pages.tintuc.details', ['news' => $news]);
    }
}
