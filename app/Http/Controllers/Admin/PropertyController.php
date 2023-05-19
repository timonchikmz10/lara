<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::Paginate(30);
        return view('auth.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PropertyRequest $request)
    {
        return view('auth.properties.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Property::create($request->all());
        session()->flash('success', config('constants.PropertyCreate') . $request->property);
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('auth.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('auth.properties.form', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        session()->flash('success', config('constants.PropertyEdit') . $request->property);
        return redirect()->route('properties.index');
    }


//     * Remove the specified resource from storagproperty
    public function destroy(Property $property)
    {
        $property->delete();
        session()->flash('success', config('constants.PropertyDelete') . $request->property);
        return redirect()->route('properties.index');
    }
}
