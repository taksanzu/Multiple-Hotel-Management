<?php

namespace App\Http\Controllers;

use App\Models\room_images;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles == 0) {
                $rooms = Rooms::where('deleted', 0)->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $rooms = Rooms::where('name', 'like', '%' . $search . '%')->where('deleted', 0)->paginate(12);
                }
            } else {
                $rooms = Rooms::where('deleted', 0)->where('created_by', Auth::id())->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $rooms = Rooms::where('name', 'like', '%' . $search . '%')->where('deleted', 0)->where('created_by', Auth::id())->paginate(12);
                }
            }
            return view('pages.rooms.loaiphong', ['rooms' => $rooms], ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stars' => 'nullable',
            'description' => 'nullable',
            'number_of_rooms' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $id = $request->id;

        if ($id) {
            $rooms = Rooms::findOrFail($id);
            $rooms->update([
                'name' => $request->name,
                'stars' => $request->stars,
                'description' => $request->description,
                'number_of_rooms' => $request->number_of_rooms
            ]);
            $room_id = $rooms->id;
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $imagesName = $image->getClientOriginalName();
                    $path = $image->move(public_path() . '/images/rooms/', $imagesName);
                    $room_images = room_images::create([
                        'name' => $imagesName,
                        'room_id' => $room_id,
                        'size' => $path->getSize()  / 1024,
                    ]);
                    $room_images->save();
                }
            }
        } else {
            $room = Rooms::create([
                'name' => $request->name,
                'stars' => $request->stars,
                'description' => $request->description,
                'number_of_rooms' => $request->number_of_rooms
            ]);
            $room->save();
            $room_id = $room->id;
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $imagesName = $image->getClientOriginalName();
                    $path = $image->move(public_path() . '/images/rooms/', $imagesName);
                    $room_images = room_images::create([
                        'name' => $imagesName,
                        'room_id' => $room_id,
                        'size' => $path->getSize()  / 1024,
                    ]);
                    $room_images->save();
                }
            }
        }

        return redirect()->route('rooms');
    }


    public function getRooms(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::findOrFail($id);
        $images = room_images::where('room_id', $id)
            ->where('deleted',0)->get();
        return response()->json(array('rooms' => $rooms, 'images' => $images));
    }
    public function deleteRooms(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::findOrFail($id);
        $rooms->update([
            'deleted' => 1
        ]);
    }

    public function deleteImages(Request $request)
    {
        $id = $request->id;
        $images = room_images::findOrFail($id);
        $images->update([
            'deleted' => 1
        ]);
    }

    public function postRooms(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::findOrFail($id);
        $rooms->update([
            'status' => 1
        ]);
    }
}
