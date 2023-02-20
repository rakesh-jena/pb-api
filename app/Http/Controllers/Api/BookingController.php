<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Parking;
use App\Models\VehicleType;
use App\Models\Booking;

class BookingController extends Controller
{
    //All Bookings
    public function allBookings()
    {
        $bookings = DB::table('bookings')->get();
        $data = [];
        foreach($bookings as $booking)
        {
            $user = User::where('id', $booking->user_id)->first();
            $parking = Parking::where('id', $booking->parking_id)->first();
            $vehicleType = VehicleType::where('id', $booking->vehicle_type)->first();
            $data['id'] = $booking->id;
            $data['user'] = $user;
            $data['parking'] = $parking;
            $data['vehicleType'] = $vehicleType;
            $data['start_time'] = $booking->start_time;
            $data['end_time'] = $booking->end_time;
            $data['created_at'] = $booking->created_at;
            $data['updated_at'] = $booking->updated_at;
        }

        return $data;
    }

    //Add Bookings
    public function addBooking(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'parking_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'vehicle_type' => 'required',
        ]);

        $request = $request->all();

        $booking = Booking::create($request);

        return $booking;
    }

    //Update Booking
    public function updateBooking(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'parking_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'vehicle_type' => 'required',
        ]);

        $booking = Booking::where('id', $request->id);
        $booking = $booking->update([
            'parking_id' => $request->parking_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'vehicle_type' => $request->vehicle_type,
        ]);

        return $booking;
    }

    //Delete Booking
    public function deleteBooking(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $booking = Booking::where('id', $request->id)->delete();

        return $booking;
    }
}
