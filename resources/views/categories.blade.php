@extends('master')
@section('title', 'Категорії')
@section('content')
@foreach($categories as $category)
    <h1><p>{{$category->title}}</p></h1>
    {{$category->description}}
@endforeach
@endsection
