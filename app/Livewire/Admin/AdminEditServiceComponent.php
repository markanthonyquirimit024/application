<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminEditServiceComponent extends Component
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
    public $description;
    

    public $newimage;
    public $service_id;

    public $featured;

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_category_id = $service->service_category_id;
        $this->price = $service->price;
        $this->discount = $service->discount;
        $this->featured = $service->featured;
        $this->discount_type = $service->discount_type;
        $this->image = $service->image;
        $this->description = $service->description;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required|string|min:10|max:80',
            'service_category_id' => 'required',
            'price' => 'required|numeric',
            'description' =>'required|string|min:10|max:255',
            'image' => 'required|mimes:jpeg,png',
        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }
    }

    public function updateService()
    {
    $this->validate([
        'name' => 'required',
        'slug' => 'required',
        'tagline' => 'required|string|min:10|max:255',
        'service_category_id' => 'required',
        'price' => 'required|numeric',
        'description' =>'required|string|min:10|max:1000',
    ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }

    $service = Service::find($this->service_id);
    $service->name = $this->name;
    $service->slug = $this->slug;
    $service->tagline = $this->tagline;
    $service->service_category_id = $this->service_category_id;
    $service->price = $this->price;
    $service->discount = $this->discount;
    $service->featured = $this->featured;
    $service->discount_type = $this->discount_type;
    $service->image = $this->image;
    $service->description = $this->description;
    
    if($this->newimage)
    {
        unlink('images/services'.'/'.$service->image);
        $imageName2 = Carbon::now()->timestamp . '.' . $this->newimage->extension();
        $this->newimage->storeAs('services', $imageName2);
        $service->image = $imageName2;
    }

    $service->save();
    session()->flash('message', 'Service has been updated successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component', ['categories' => $categories])->layout('layouts.base');
    }
}
