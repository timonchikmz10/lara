@extends('layouts.master')
@if($category != null)
    @section('title', $category->title)
    @section('content')
        <h1><p>{{$category->title}}</p></h1>
        <h2>{{$category->description}}</h2>
        <h3>Товарів({{$category->products->count()}})</h3>
        @foreach($category->products as $product)
            @include('layouts.card', ['product'=>$product])
        @endforeach
    @endsection
@else
    @section('title', 'Невідома сторінка')
    @section('content')
        <h1>Невідома сторінка</h1>
    @endsection
@endif

