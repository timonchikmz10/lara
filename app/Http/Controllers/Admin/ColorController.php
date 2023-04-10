<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::Paginate(30);
        return view('auth.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ColorRequest $request)
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::create($request->all());
        session()->flash('success', 'Колір ' . $request->color . ', успішно створено.');
        return redirect()->route('colors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view('auth.colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('auth.colors.form', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $color->update($request->all());
        session()->flash('success', 'Колір ' . $color->title . ', успішно онвленно.');
        return redirect()->route('colors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        session()->flash('success', 'Колір ' . $color->title . ', був видалений з палітри кольорів');
        return redirect()->route('colors.index');
    }
}
