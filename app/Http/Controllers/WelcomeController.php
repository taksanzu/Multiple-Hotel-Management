<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\room_images;
use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('mainpages.pages.welcome');
    }
}
