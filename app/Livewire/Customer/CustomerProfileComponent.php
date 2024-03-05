<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerProfileComponent extends Component
{
    public function render()
    {
        if(Auth::check())
        {
        $customer = Customer::where('customer_id', Auth::user()->id)->first();
        return view('livewire.customer.customer-profile-component', ['customer' => $customer])->layout('layouts.base');
        }

        return redirect()->route('login');
    }    

}
