<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {    
        $service_id = $request->input('service_id');
        $service = Service::find($service_id);
        
        $service_location = $request->input('service_locations');
        $servicelocations = ServiceProvider::where('service_locations', $service_location)->get();

        $booking = new Booking();
        $booking->user_id = $request->input('user_id');
        $booking->booking_status = $request->input('booking_status');
        $booking->service_id = $request->input('service_id');
        $booking->name = $request->input('name');
        $booking->date = $request->input('date');
        $booking->service_title = $request->input('service_title');
        $booking->price = $request->input('price');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->image = $request->input('image');
        $booking->user_location = $request->input('user_location');
        $booking->time = $request->input('time');
        $booking->service_locations = $servicelocations->pluck('service_locations')->implode(', ');
        $booking->booking_status = 'Waiting for Approval';

        if ($booking->save()) {
            session()->flash('message', 'Service has been booked successfully');
        } else {
            session()->flash('message', 'Error: Unable to book the service');
        }
        return redirect()->route('customer.booking_history');
    }

    public function approval($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status = "Approved, Your repairman is on the way.";
        $booking->save();
        
        return redirect()->back(); 
    }

    public function bookingconfirm($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status = "Successful Booking";
        $booking->save();
        
        return redirect()->back(); 
    }
}
