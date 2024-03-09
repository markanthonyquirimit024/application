<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Support\Facades\Response;



class ServiceByCategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($category_slug)
    // {
    //     $scategory = ServiceCategory::with('services')->where('slug', $category_slug)->first();

    //     if ($scategory) {
    //         $services = ServiceResource::collection($scategory->services);
    //         return response()->json(['data' => ['category' => $scategory, 'services' => $services]], 200);
    //     } else {
    //         return response()->json(['error' => 'Service category not found'], 404);
    //     }    
    // }

    
    public function index($category_slug)
    {
        $scategory = ServiceCategory::with('services')->where('slug', $category_slug)->first();

        if ($scategory) {
            // $services = ServiceResource::collection($scategory->services);
            // return response()->json(['data' => ['category' => $scategory, 'services' => $services]], 200);
            return response()->json(['data' => ['category' => $scategory]], 200);

        } else {
            return response()->json(['error' => 'Service category not found'], 404);
        }    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
