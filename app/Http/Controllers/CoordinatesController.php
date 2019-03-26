<?php

namespace App\Http\Controllers;

use App\Coordinate;
use Illuminate\Http\Request;

class CoordinatesController extends Controller
{
    public function index()
    {
        $coords = Coordinate::all();
        return response()->json($coords, 200);
    }
    public function show()
    {
        $loc = Coordinate::where('stn_name', request()->name)->first();
        return response()->json($loc, 200);
    }
}
