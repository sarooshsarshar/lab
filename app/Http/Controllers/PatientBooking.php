<?php

namespace App\Http\Controllers;

use App\BookingModel;
use Illuminate\Http\Request;

class PatientBooking extends Controller
{
    public function booking_list()
    {
        // ASC
        $booking = BookingModel::with('booking_test' , 'booking_test.test')
        ->where('status' , 0)
        ->orderBy('id' , 'DESC')->get();
        
        return view('booking.index', compact('booking'));
    }

    public function booking_approved()
    {
        $booking = BookingModel::with('booking_test' , 'booking_test.test')
        ->where('status' , 1)
        ->get();
        
        return view('booking.approved', compact('booking'));
    }

    public function approve_booking(BookingModel $booking)
    {
        $booking->status = 1;
        $booking->save();
        return redirect()->route('booking.list')->with('success', 'Successfully approve the booking!');
    }

    public function reject_booking(BookingModel $booking)
    {
        $booking->status = 2;
        $booking->save();
        return redirect()->route('booking.list')->with('success', 'Successfully reject the booking!');
    }

    public function complete_booking(BookingModel $booking)
    {
        $booking->status = 3;
        $booking->save();
        return redirect()->route('booking.list')->with('success', 'Successfully Complete the booking!');
    }
}
