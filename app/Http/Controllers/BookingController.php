<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $subdomain = explode('.', $_SERVER['HTTP_HOST']);
        $user = User::where('domain', $subdomain[0])->first();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'notes' => 'nullable',
            'checkin' => 'required',
            'checkout' => 'required',
            'number_of_adults' => 'required',
            'number_of_children' => 'required',
            'number_of_rooms' => 'required',
            'room_type' => 'required',
        ]);
        $checkin = Carbon::createFromFormat('d/m/Y', $request->checkin)->format('Y-m-d');
        $checkout = Carbon::createFromFormat('d/m/Y', $request->checkout)->format('Y-m-d');
        $booking = Booking::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'number_of_adults' => $request->number_of_adults,
            'number_of_children' => $request->number_of_children,
            'number_of_rooms' => $request->number_of_rooms,
            'room_type' => $request->room_type,
            'user_id' => $user->id,
        ]);
        $booking->save();
        return redirect()->route('loaiphong.index');
    }
}
