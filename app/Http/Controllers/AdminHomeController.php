<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $usercount = User::count();
        return view('pages.admin.index',['usercount' => $usercount]);
    }
}
