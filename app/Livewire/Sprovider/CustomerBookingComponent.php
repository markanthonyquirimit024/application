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

        $serviceProvider = ServiceProvider::where('user_id', $user->id)->first();
        $serviceLocation = $serviceProvider->service_locations;

        $bookings = Booking::where('service_locations', $serviceLocation)->paginate(10);

        return view('livewire.sprovider.customer-booking-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
