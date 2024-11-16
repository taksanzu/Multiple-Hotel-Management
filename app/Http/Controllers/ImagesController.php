<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $images = Images::where('deleted', 0)->where('created_by', Auth::user()->id)->orderBy('id','desc')->paginate(24);
            return view('pages.images.index', ['user' => $user, 'images' => $images]);
        } else {
            return redirect()->route('login');
        }
    }

    public function paginationAjax(Request $request)
    {
        if ($request->ajax()) {
            $images = Images::where('deleted', 0)->paginate(24);
            return view('pages.images.imagesGallery', ['images' => $images])->render();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imagesName = $image->getClientOriginalName();
                $path = $image->move(public_path() . '/images/hotel/', $imagesName);
                $imagesHotel = Images::create([
                    'name' => $imagesName,
                    'size' => $path->getSize()  / 1024,
                    'created_by' => Auth::user()->id
                ]);
                $imagesHotel->save();
            }
        }
        return redirect()->route('images');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $image = Images::findOrFail($id);
        $image->update([
            'deleted' => 1
        ]);
        return redirect()->route('images');
    }
    public function getImages(Request $request)
    {
        $id = $request->id;
        $image = Images::findOrFail($id);
        return response()->json('images', $image);
    }
}
