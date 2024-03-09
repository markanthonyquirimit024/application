<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Response;



class BookingApiController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
    
        if ($user && $user->utype === 'CST') {
            $perPage = $request->input('per_page', 10);
    
            $bookings = Booking::paginate($perPage);
    
            return Response::json($bookings);
        } else {
            return Response::json(['error' => 'Unauthorized'], 401);
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->utype === 'CST'){

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
            return Response::json(['success' => 'Service has been booked successfully'],200);

        } else {
            return Response::json(['error' => 'Unable to book the service'], 401);

        }
        }else{
            return Response::json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        if($user && $user->utype === 'CST'){

        $booking = Booking::find($id);

        if (!$booking) {
            return Response::json(['error' => 'Booking not found.'], 401);
        }
        $booking->booking_status = "Cancelled Booking";
        $booking->save();

        return Response::json(['success' => 'Booking has been successfully cancelled.'], 200);

    }else {
        return Response::json(['error' => 'Unauthorized'], 401);

    }
    }
}
