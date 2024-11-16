<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rooms;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function __construct()
    {
        $roomTypes = Rooms::where('deleted', 0)->get();
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first();
        if(count($subdomain) > 2){
            $user = User::where('status', 0)->where('domain', $subdomain[0])->with('settings','rooms.roomImages', 'images', 'news')->first();
            if($user == null){
                return 'Không tìm thấy trang web';
            }
        }
        $bookingStatus = Booking::where('status', 0)->get();
        view()->share(['roomTypes' => $roomTypes , 'user' => $user, 'bookingStatus' => $bookingStatus]);
    }
}
