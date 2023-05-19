<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;

use function GuzzleHttp\Promise\all;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Info::first()){
        $info = Info::first();
//        dd($info);
        return view('auth.info.index', compact('info'));
        }else {
            return view('auth.info.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.info.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        if($request->has('image')) {
            $path = $request->file('image')->store('logo');
            $params['image'] = $path;
        }
        Info::create($params);
        session()->flash('success', 'Загальна інформація додана.');
        return redirect()->route('info.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        return view('auth.info.form', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        $params = $request->all();
        if($request->has('image')){
            if($info->image) {
                Storage::delete($info->image);
            }
            $path = $request->file('image')->store('logo');
            $params['image'] = $path;
        }
        $info->update($params);
        session()->flash('success', 'Загальна інформація змінена.');
        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
