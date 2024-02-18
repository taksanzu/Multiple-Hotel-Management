<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingImageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.setting.image', ['user' => $user]);
    }
}
