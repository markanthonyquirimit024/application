<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SearchController extends Controller
{
    public function autocomplete(Request $request) 
    {
        $data = Service::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);    
    }

    public function searchService(Request $request)
    {
        $service_slug = Str::slug($request->q,'-');
        if($service_slug)
        {
            return redirect('/service/'. $service_slug);
        }
        else
        {
            return back();
        }
    }

public function getDetails(Request $request)
{
    $serviceLocation = $request->input('service_location');

    $serviceProvider = ServiceProvider::where('service_locations', $serviceLocation)->first();

    if ($serviceProvider) {
        $user = $serviceProvider->user;

        return response()->json([
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    return response()->json(['error' => 'No data found for the selected service location.'], 404);
}

}
