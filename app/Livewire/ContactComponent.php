<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

     

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'message'  => 'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'message'  => 'required'
        ]);

        $contacts = new Contact();
        $contacts->name = $this->name;
        $contacts->email = $this->email;
        $contacts->phone = $this->phone;
        $contacts->message = $this->message;
        $contacts->save();
        session()->flash('message', 'Your message has been successfully submitted!');
    }

    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}
