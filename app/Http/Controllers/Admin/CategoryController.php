<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\s;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('auth.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if($request->has('image')) {
            $path = $request->file('image')->store('categories');
            $params = $request->all();
            $params['image'] = $path;
            Category::create($params);
        }else{
         Category::create($request->all());
        }
        session()->flash('success', 'Категорію ' . $request->title . ' створено.');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ($request->has('image')) {
            if(isset($category->image)){
                Storage::delete($category->image);
            }
            $path = $request->file('image')->store('categories');
            $params = $request->all();
            $params['image'] = $path;
            $category->update($params);
        } else {
            $category->update($request->all());
        }
        session()->flash('success', 'Категорію ' . $request->title . ' оновлено.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        session()->flash('success', 'Категорія ' . $category->title . ' була видалена.');
        return redirect()->route('categories.index');
    }
}
