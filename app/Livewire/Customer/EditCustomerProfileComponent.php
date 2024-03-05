<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use  Livewire\WithFileUploads;

class EditCustomerProfileComponent extends Component
{

    use WithFileUploads;
    public $customer_id;
    public $name;
    public $email;
    public $image;
    public $phone;
    public $newimage;

    

    public function mount($id)
    {
        $customer = User::findOrFail($id);
        $this->customer_id = $id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->image = $customer->image;
    }

    public function updateProfile()
{
    $user = User::findOrFail($this->customer_id);

    if ($this->newimage) {
        $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
        $this->newimage->storeAs('customers', $imageName);
        $user->image = $imageName;
    }

    $user->name = $this->name;
    $user->email = $this->email;
    $user->phone = $this->phone;
    $user->save();

    session()->flash('message', 'Profile has been successfully updated!');
}


    public function render()
    {
        return view('livewire.customer.edit-customer-profile-component')->layout('layouts.base');
    }

    
}
