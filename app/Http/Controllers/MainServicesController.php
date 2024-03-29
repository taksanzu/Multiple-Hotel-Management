<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class MainServicesController extends Controller
{
    public function index()
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('id', 1)->with('settings','rooms.roomImages', 'images', 'news')->first()->id;
        if(count($subdomain) > 2){
            $user = User::where('domain', $subdomain[0])->first()->id;
        }
        $services = News::where('deleted', 0)->where('type', 0)->where('status', 1)->where('created_by', $user)->paginate(6);
        return view('mainpages.pages.tienich.index', ['services' => $services]);
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $service = News::findOrFail($id);
        return view('mainpages.pages.tienich.details', ['service' => $service]);
    }
}
