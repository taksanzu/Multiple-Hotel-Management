<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainImagesController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $images = Images::where('deleted', 0)
            ->where('created_by', $user)
            ->paginate(16);
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.hinhanh.index', ['images' => $images]);
    }
}
