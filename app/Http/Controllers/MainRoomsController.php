<?php

namespace App\Http\Controllers;

use App\Models\room_images;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class MainRoomsController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first();
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $rooms = Rooms::where('deleted', 0)
            ->where('status', 1)
            ->where('created_by', $user)
            ->withCount('roomImages')
            ->paginate(4);
        return view('mainpages.pages.loaiphong.index', ['rooms' => $rooms]);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::findOrFail($id);
        $images = room_images::where('room_id', $id)
            ->where('deleted',0)->get();
        return view('mainpages.pages.loaiphong.details', ['rooms' => $rooms, 'images' => $images]);
    }
}
