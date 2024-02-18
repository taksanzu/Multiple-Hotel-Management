<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function __construct()
    {
        $roomTypes = Rooms::where('deleted', 0)->get();
        $settings = Setting::get();
        view()->share(['roomTypes' => $roomTypes , 'settings' => $settings]);
    }
}
