<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class MainImagesController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $images = Images::where('deleted', 0)
            ->where('created_by', $user)
            ->paginate(16);
        return view('mainpages.pages.hinhanh.index', ['images' => $images]);
    }
}
