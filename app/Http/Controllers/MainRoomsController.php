<?php

namespace App\Http\Controllers;

use App\Models\room_images;
use App\Models\Rooms;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class MainRoomsController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $rooms = Rooms::where('deleted', 0)
            ->where('status', 1)
            ->where('created_by', $user)
            ->withCount('roomImages')
            ->paginate(4);
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.loaiphong.index', ['rooms' => $rooms]);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::findOrFail($id);
        $images = room_images::where('room_id', $id)
            ->where('deleted',0)->get();
        $service_categories = ServiceCategory::all();
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $page = Setting::where('name', 'template')->where('user_id', $user)->first()->value;
        return view('mainpages.'.$page.'.pages.loaiphong.details', ['rooms' => $rooms, 'images' => $images, 'service_categories' => $service_categories]);
    }
}
