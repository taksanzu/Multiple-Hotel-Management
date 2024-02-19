<?php

namespace App\Http\Controllers;

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
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first();
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->with('settings','rooms.roomImages', 'images', 'news')->first();
            if(!$user){
                return 'Không tìm thấy trang web';
            }
        }
        $roomTypes = Rooms::where('deleted', 0)->get();
        view()->share(['roomTypes' => $roomTypes , 'user' => $user]);
    }
}
