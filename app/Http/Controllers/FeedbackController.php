<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

// public function store(Request $request, $id)
// {
//     $booking = Booking::find($id);

//     $request->validate([
//         'message' => 'nullable|string',
//         'rating' => 'required|numeric|min:1|max:5'
//     ]);
    

//         $feedback = new Feedback();
//         $feedback->booking_id = $booking->id;
//         $feedback->service_title = $booking->service_title;
//         $feedback->image = $booking->image;
//         $feedback->rating = $request->input('rating');
//         $feedback->message = $request->input('message');


//         if($feedback->save())
//         {
//             $booking->update(['booking_status' => 'Thank you for your feedback']);

//         }else{
//             session()->flash('message', 'Error: Unable to save feedback. Please try again later.');
//         }
//     return redirect()->route('customer.booking_history');
// }




}
