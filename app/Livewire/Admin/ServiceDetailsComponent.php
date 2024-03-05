<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ServiceDetailsComponent extends Component
{

    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function render()
    {
        $sproviders = ServiceProvider::all();
        $scategories = ServiceCategory::all();
        $service = Service::where('slug', $this->service_slug)->first();
        $r_service = Service::where('service_category_id', $service->service_category_id)->where('slug', '!=', $this->service_slug)->inRandomOrder()->first();
        return view('livewire.admin.service-details-component', ['sproviders' => $sproviders,'scategories' => $scategories,'service' => $service, 'r_service' => $r_service])->layout('layouts.base');
    }
}
