<?php

namespace App\Livewire\Sprovider;

use App\Models\Booking;
use App\Models\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerBookingComponent extends Component
{

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            session()->flash('message', 'Booking not found.');
            return redirect()->back();
        }
        $booking->booking_status = "Provider Cancelled Booking";
        $booking->save();

        session()->flash('message', 'Booking has been successfully cancelled .');
        return redirect()->back();
    }

    public function render()
    {
        $user = Auth::user();

        $serviceProvider = ServiceProvider::where('user_id', $user->id)->first();
        $serviceLocation = $serviceProvider->service_locations;

        $bookings = Booking::where('service_locations', $serviceLocation)->orderBy('id', 'desc')->paginate(10);

        return view('livewire.sprovider.customer-booking-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
