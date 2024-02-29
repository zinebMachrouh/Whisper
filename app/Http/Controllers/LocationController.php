<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function send(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        return response()->json(['success' => true]);
    }
}
