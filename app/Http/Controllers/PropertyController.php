<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request){
        $properties = Property::with('user','category')->where('type',$request->type)->latest()->paginate(10);
        return view('properties.list',get_defined_vars());
    }
}
