@extends('master')
@if($category != null)
    @section('title', $category->title)
    @section('content')
        <h1><p>{{$category->title}}</p></h1>
        {{$category->description}}
        @foreach($products as $product)
            @include('card', ['product'=>$product])
        @endforeach
    @endsection
@else
    @section('title', 'Невідома сторінка')
    @section('content')
        <h1>Невідома сторінка</h1>
    @endsection
@endif

