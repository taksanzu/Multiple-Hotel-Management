<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MainServicesController extends Controller
{
    public function index()
    {
        $services = News::where('deleted', 0)->where('type', 0)->where('status', 1)->paginate(6);
        return view('mainpages.pages.tienich.index', ['services' => $services]);
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $service = News::findOrFail($id);
        return view('mainpages.pages.tienich.details', ['service' => $service]);
    }
}
