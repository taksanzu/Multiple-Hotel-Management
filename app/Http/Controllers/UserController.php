<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles == 0) {
                $userLists = User::paginate(12);
            } else {
                return redirect()->route('userHome');
            }
            return view('pages.userList.userList', ['userLists' => $userLists, 'user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }
}
