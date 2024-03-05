<?php

namespace App\Livewire\Admin;

use App\Models\ServiceProvider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceProviderComponent extends Component
{
    use WithPagination;

    public function deleteServiceprovider($sproviders_id)
    {
        $sprovidersacct = ServiceProvider::find($sproviders_id);
        $sprovidersacct->delete();
        session()->flash('message', 'Service Providers has been successfully deleted.');
    }

    public function render()
    {

        $sproviders = ServiceProvider::paginate(12);
        return view('livewire.admin.admin-service-provider-component', ['sproviders' => $sproviders])->layout('layouts.base');
    }
}
