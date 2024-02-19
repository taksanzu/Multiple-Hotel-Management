<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingImageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.setting.image', ['user' => $user]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file_name = $file->getClientOriginalName();
            $file->move('logo', $file_name);
            Setting::updateOrCreate(['user_id'=> Auth::user()->id,'name'=>'logo'],['user_id'=> Auth::user()->id,'name'=>'logo','value' => $file_name]);
        }

        for ($i = 1; $i <= 11; $i++) {
            if ($request->hasFile('image' . $i)) {
                $file = $request->file('image' . $i);
                $file_name = $file->getClientOriginalName();
                $file->move('images', $file_name);
                Setting::updateOrCreate(['user_id'=> Auth::user()->id,'name'=>'image' . $i],['user_id'=> Auth::user()->id,'name'=>'image' . $i,'value' => $file_name]);
            }
        }
        return redirect()->route('settingImage');
    }
}
