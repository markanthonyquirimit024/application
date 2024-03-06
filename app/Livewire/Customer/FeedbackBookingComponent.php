<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Livewire\Component;

class FeedbackBookingComponent extends Component
{
    public $booking_id;
    public $image;
    public $service_title;
    public $message;
    public $name;
    public $rating;

    public function mount($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $this->booking_id = $booking_id;
        $this->image = $booking->image;
        $this->service_title = $booking->service_title;
        $this->name = $booking->name;
    }

public function storefeedback()
    {
        $this->validate([
            'message' => 'nullable|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $booking = Booking::find($this->booking_id);

        $feedback = new Feedback();
        $feedback->name = $booking->name;
        $feedback->booking_id = $booking->id;
        $feedback->service_title = $booking->service_title;
        $feedback->image = $booking->image;
        $feedback->rating = $this->rating;
        $feedback->message = $this->message;

        if ($feedback->save()) {
            $booking->update(['booking_status' => 'Thank you for your Feedback']);
            session()->flash('message', 'Thank you for your feedback');
            return redirect()->route('customer.booking_history');
        } else {
            session()->flash('error', 'Error saving feedback. Please try again.');
            return redirect()->route('customer.booking_history');
        }
    }


    public function render()
    {
        return view('livewire.customer.feedback-booking-component')->layout('layouts.base');
    }
}
