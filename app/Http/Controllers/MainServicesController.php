<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainServicesController extends Controller
{
    public function index()
    {
        return view('mainpages.pages.tienich.index');
    }
}
