<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMaill;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserHomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $bookings = Booking::where('user_id', Auth::user()->id)->with(
                ['room' => function ($query) {
                    $query->select('id', 'name'); // Chọn chỉ các trường cần thiết của bảng room
                }]
            )->paginate(12);

            return view('pages.user.userHome', ['user' => $user, 'bookings' => $bookings]);
        } else {
            return redirect()->route('login');
        }
    }

    public function getBooking(Request $request)
    {
        $id = $request->id;
        $booking = Booking::with(
            ['room' => function ($query) {
                $query->select('id', 'name');
            }]
        )->findOrFail($id);
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
        $total = $booking->room->price * $booking->number_of_rooms;
        $user = Auth::user()->name;
        Mail::to($booking->email)->send(new MyTestMaill($booking, $total, $user));
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
