<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.setting.information', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'value' => 'required',
        ]);

        $id = $request->id;
        if ($id) {
            $setting = Setting::findOrFail($id);
            $setting->update([
                'name' => $request->name,
                'description' => $request->description,
                'value' => $request->value,
                'user_id' => Auth::user()->id,
            ]);
        } else {
            Setting::create([
                'name' => $request->name,
                'description' => $request->description,
                'value' => $request->value,
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect()->route('setting');
    }
}
