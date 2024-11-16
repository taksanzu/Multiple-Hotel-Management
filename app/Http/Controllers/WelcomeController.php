<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\room_images;
use App\Models\Rooms;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.welcome');
    }
}
