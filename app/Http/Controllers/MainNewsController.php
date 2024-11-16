<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
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
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.tintuc.index', ['news' => $news]);
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.tintuc.details', ['news' => $news]);
    }
}
