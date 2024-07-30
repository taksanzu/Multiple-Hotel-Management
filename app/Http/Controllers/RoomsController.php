<?php

namespace App\Http\Controllers;

use App\Models\room_images;
use App\Models\Rooms;
use App\Models\ServiceCategory;
use App\Models\ServiceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $service_categories = ServiceCategory::all();
            if ($user->roles == 0) {
                $rooms = Rooms::where('deleted', 0)->orderBy('id', 'desc')->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $rooms = Rooms::where('name', 'like', '%' . $search . '%')->where('deleted', 0)->paginate(12);
                }
            } else {
                $rooms = Rooms::where('deleted', 0)->where('created_by', Auth::id())->orderBy('id', 'desc')->paginate(12);
                $search = $request->search;
                if ($search != null) {
                    $rooms = Rooms::where('name', 'like', '%' . $search . '%')->where('deleted', 0)->where('created_by', Auth::id())->paginate(12);
                }
            }
            return view('pages.rooms.loaiphong', ['rooms' => $rooms ,'user' => $user, 'service_categories' => $service_categories]);
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
            'videolink' => 'nullable',
            'link360' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image360.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $id = $request->id;
        $statusValues = $request->input('status', []);

        if ($id) {
            $rooms = Rooms::findOrFail($id);
            if ($request->hasFile('image360')) {
                $image360 = $request->file('image360');
                $image360Name = $image360->getClientOriginalName();
                $path = $image360->move(public_path() . '/images/rooms/', $image360Name);
            }else{
                $image360Name = null;
            }
            $rooms->update([
                'name' => $request->name,
                'stars' => $request->stars,
                'description' => $request->description,
                'price' => $request->price,
                'slug' => ChangeToSlug($request->name),
                'number_of_rooms' => $request->number_of_rooms,
                'videolink' => $request->videolink,
                'link360' => $request->link360,
                'image360' => $image360Name,
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
            foreach ($statusValues as $serviceId) {
                $isChecked = in_array($serviceId, $request->input('status', []));
                $status = $isChecked ? 1 : 0;
                ServiceUser::updateOrCreate(
                    ['service_id' => $serviceId, 'room_id' => $room_id],
                    ['status' => $status, 'room_id' => $room_id]
                );
            }

        } else {
            if ($request->hasFile('image360')) {
                $image360 = $request->file('image360');
                $image360Name = $image360->getClientOriginalName();
                $path = $image360->move(public_path() . '/images/rooms/', $image360Name);
            }else{
                $image360Name = null;
            }
            $room = Rooms::create([
                'name' => $request->name,
                'stars' => $request->stars,
                'description' => $request->description,
                'slug' => ChangeToSlug($request->name),
                'price' => $request->price,
                'number_of_rooms' => $request->number_of_rooms,
                'videolink' => $request->videolink,
                'link360' => $request->link360,
                'created_by' => Auth::user()->id,
                'image360' => $image360Name,
            ]);
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
            foreach ($statusValues as $serviceId) {
                $isChecked = in_array($serviceId, $request->input('status', []));
                $status = $isChecked ? 1 : 0;
                ServiceUser::updateOrCreate(
                    ['service_id' => $serviceId, 'room_id' => $room_id],
                    ['status' => $status, 'room_id' => $room_id]
                );
            }
        }
        return redirect()->route('rooms');
    }


    public function getRooms(Request $request)
    {
        $id = $request->id;
        $rooms = Rooms::where('id', $id)->with('service_user')->first();
        $images = room_images::where('room_id', $id)
            ->
            where('deleted',0)->get();
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
            'status' => $rooms->status == 1 ? 0 : 1
        ]);
    }
}
