<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BookingHistoryComponent extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            session()->flash('message', 'Booking not found.');
            return redirect()->back();
        }
        $booking->booking_status = "Cancelled Booking";
        $booking->save();

        session()->flash('message', 'Booking has been successfully cancelled .');
        return redirect()->back();
    }


    
    public function render()
    {
<<<<<<< HEAD
        $user = Auth::user();

        if (!$user) {
        }

        $bookings = Booking::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);
=======
        $bookings = Booking::orderBy('id', 'desc')->paginate(10);
>>>>>>> db64038a240d8434b68a3e8ae7ad8984681f1af4
        return view('livewire.customer.booking-history-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
