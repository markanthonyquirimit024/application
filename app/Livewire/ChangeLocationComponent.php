<?php

namespace App\Livewire;

use Livewire\Component;

class ChangeLocationComponent extends Component
{
    public $streetnumber;
    public $routes;
    public $city;
    public $state;
    public $country;
    public $zipcode;

    public function changeLocation()
    {
        $this->validate([
            'streetnumber' => 'required',
            'routes' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ]);

        session()->put([
            'streetnumber' => $this->streetnumber,
            'routes' => $this->routes,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipcode' => $this->zipcode,
        ]);

        session()->flash('message', 'Location has been changed');
        $this->emitTo('location-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.change-location-component')->layout('layouts.base');
    }
}
