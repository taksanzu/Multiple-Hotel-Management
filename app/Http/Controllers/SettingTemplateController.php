<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingTemplateController extends Controller
{
    public function index()
    {
        return view('pages.setting.template');
    }

    public function changeTemplateMau1()
    {
        $user = Auth::user();
        $user->settings()->where('name','template')->update(['value' => 'mau1']);
        return redirect()->route('settingTemplate');
    }

    public function changeTemplateMau2()
    {
        $user = Auth::user();
        $user->settings()->where('name','template')->update(['value' => 'mau2']);
        return redirect()->route('settingTemplate');
    }
}
