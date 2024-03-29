<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function loginIndex()
    {
        return view('pages.auth.login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('userHome');
        }

        throw ValidationException::withMessages([
            'email' => ['Email hoặc mật khẩu không chính xác.'],
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function changePassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'renewPassword' => 'required|same:newPassword'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the old password matches the current password
        if (!Hash::check($request->oldPassword, $user->password)) {
            return response()->json(['error' => 'Mật khẩu cũ không chính xác']);
        }

        // Update the user's password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return response()->json(['success' => 'Mật khẩu đã được thay đổi thành công']);
    }
}
