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
            $images = Images::where('deleted', 0)->paginate(18);
            $user = Auth::user();
            return view('pages.images.index', ['user' => $user, 'images' => $images]);
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imagesName = $image->getClientOriginalName();
                $path = $image->move(public_path() . '/images/hotel/', $imagesName);
                Images::create([
                    'name' => $imagesName,
                    'size' => $path->getSize() / 1024,
                ]);
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
}
