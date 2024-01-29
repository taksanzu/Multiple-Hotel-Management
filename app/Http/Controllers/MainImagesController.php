<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class MainImagesController extends Controller
{
    public function index()
    {
        $images = Images::where('deleted', 0)->paginate(16);
        return view('mainpages.pages.hinhanh.index', ['images' => $images]);
    }
}
