<?php

namespace App\Livewire;

<<<<<<< HEAD
use App\Models\Contact;
=======
>>>>>>> db64038a240d8434b68a3e8ae7ad8984681f1af4
use App\Models\Feedback;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\Slider;
use App\Models\User;
use Livewire\Component;

class HomeComponent extends Component
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

        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $fscategories = ServiceCategory::where('featured',1)->take(8)->get();
        $sid = Service::whereIn('slug', ['ac', 'tv', 'refrigerator', 'geyser', 'water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id', $sid)->inRandomOrder()->take(8)->get();
        $feedbacks = Feedback::take(5)->get();
        $slides = Slider::where('status',1)->get();
<<<<<<< HEAD
        $sproviders = ServiceProvider::all();
        $serviceproviders = User::where('utype', 'SVP')->get();
        return view('livewire.home-component', ['serviceproviders' => $serviceproviders,'sproviders' => $sproviders, 'slides' => $slides,'feedbacks' => $feedbacks, 'scategories' => $scategories, 'fservices' => $fservices, 'fscategories' => $fscategories, 'aservices' => $aservices])->layout('layouts.base');
=======
        return view('livewire.home-component', ['slides' => $slides,'feedbacks' => $feedbacks, 'scategories' => $scategories, 'fservices' => $fservices, 'fscategories' => $fscategories, 'aservices' => $aservices])->layout('layouts.base');
>>>>>>> db64038a240d8434b68a3e8ae7ad8984681f1af4
    }
}
