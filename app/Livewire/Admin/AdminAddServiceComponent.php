<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required|string|min:10|max:80',
            'service_category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
            'description' =>'required|string|min:10|max:255',
            
        ]);
    
    }

    public function createService()
    {
    $this->validate([
        'name' => 'required',
        'slug' => 'required',
        'tagline' => 'required|string|min:10|max:255',
        'service_category_id' => 'required',
        'price' => 'required|numeric',
        'description' => 'required|string|min:10|max:1000',
        'image' => 'required|mimes:jpeg,png',
        
    ]);

    $service = new Service();
    $service->name = $this->name;
    $service->slug = $this->slug;
    $service->tagline = $this->tagline;
    $service->service_category_id = $this->service_category_id;
    $service->price = $this->price;
    $service->discount = $this->discount;
    $service->discount_type = $this->discount_type;
    $service->image = $this->image;
    $service->description = $this->description;

    $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
    $this->image->storeAs('services', $imageName2);
    $service->image = $imageName2;

    $service->save();
    session()->flash('message', 'Service has been created successfully');
}

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component', ['categories' => $categories])->layout('layouts.base');
    }
}
