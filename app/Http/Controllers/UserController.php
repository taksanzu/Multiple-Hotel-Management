<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'domain' => $request->domain,
                'roles' => $request->roles,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'domain' => $request->domain,
                'password' => Hash::make($request->password),
                'roles' => $request->roles
            ]);
        }
        return redirect()->route('userList');
    }

    public function getUser(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }
}
