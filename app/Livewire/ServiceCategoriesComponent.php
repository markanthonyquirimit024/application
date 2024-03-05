<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Livewire\Component;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $sproviders = ServiceProvider::all();
        $scategories = ServiceCategory::all();
        $services = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        return view('livewire.service-categories-component', ['scategories' => $scategories, 'services' => $services, 'sproviders' => $sproviders])->layout('layouts.base');
    }
}
