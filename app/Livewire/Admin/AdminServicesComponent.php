<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;

    public function deleteService($service_id)
    {
        $service = Service::find($service_id);
        if($service->image)
        {
            unlink('images/services/' . $service->image);
        }
        $service->delete();
        session()->flash('message', 'Service has been successfully deleted.');
    }

    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.admin-services-component', ['services' => $services])->layout('layouts.base');
    }
}
