@extends('master')
@section('title', $category->title)
@section('content')
<h1><p>{{$category->title}}</p></h1>
{{$category->description}}
@endsection
