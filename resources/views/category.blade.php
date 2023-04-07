@extends('layouts.master')
@section('title', 'Категорія: ' . $category->title)
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="store" class="col-md-12">
                    <!-- store products -->
                    <div class="row">
                        <h1><p>{{$category->title}}</p></h1>
                        <h2>{{$category->description}}</h2>
                        <h3>Товарів({{$category->products->count()}})</h3>
                        @foreach($category->products()->with('category')->get() as $product)
                            @include('layouts.for_category_page_card', ['product'=>$product])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
