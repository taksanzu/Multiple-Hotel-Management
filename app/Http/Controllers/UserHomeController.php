<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles == 0) {
                $bookings = Booking::paginate(12);
            } else {
                $bookings = Booking::where('user_id', Auth::id())->paginate(12);
            }
            return view('pages.user.userHome', ['user' => $user, 'bookings' => $bookings]);
        } else {
            return redirect()->route('login');
        }
    }

    public function getBooking(Request $request)
    {
        $id = $request->id;
        $booking = Booking::findOrFail($id);
        return response()->json([
            'success' => true,
            'booking' => $booking
        ]);
    }

    public function accept(Request $request)
    {
        $id = $request->id;
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 1
        ]);
        return redirect()->route('userHome');
    }

public function cancel(Request $request)
    {
        $id = $request->id;
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 2
        ]);
        return redirect()->route('userHome');
    }
}
