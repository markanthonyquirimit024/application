<?php

namespace App\Livewire\Sprovider;

use App\Models\Booking;
use App\Models\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerBookingComponent extends Component
{
    public function render()
    {
        $user = Auth::user();

        if (!$user) {
            // Handle the case where the user is not authenticated
            // You may redirect them to the login page or take another action
        }

        // Assuming 'service_locations' is the field in ServiceProvider model representing the location
        $serviceProvider = ServiceProvider::where('user_id', $user->id)->first();
        $serviceLocation = $serviceProvider->service_locations;

        // Fetch bookings based on the service location
        $bookings = Booking::where('service_locations', $serviceLocation)->paginate(10);

        return view('livewire.sprovider.customer-booking-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
