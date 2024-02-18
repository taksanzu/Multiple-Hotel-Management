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
        $rooms = Rooms::where('deleted', 0)->paginate(2);
        // Lấy một ảnh đầu tiên cho mỗi phòng
        $rooms->load(['roomImages' => function ($query) {
            $query->where('deleted', 0)->take(2);
        }]);
        $news = News::where('deleted', 0)->paginate(2);
        return view('mainpages.pages.welcome', ['rooms' => $rooms, 'news' => $news]);
    }
}
