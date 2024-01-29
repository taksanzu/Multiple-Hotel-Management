<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainNewsController extends Controller
{
    public function index()
    {
        return view('mainpages.pages.tintuc.index');
    }
}
