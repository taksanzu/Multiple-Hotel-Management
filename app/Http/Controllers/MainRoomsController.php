<?php

namespace App\Http\Controllers;

use App\Models\room_images;
use App\Models\Rooms;
use Illuminate\Http\Request;

class MainRoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::where('deleted', 0)
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
