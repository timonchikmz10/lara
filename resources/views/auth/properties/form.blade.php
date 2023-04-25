@extends('auth.layouts.master')
@isset($property)
    @section( 'title', 'Змінити атрібут: ' . $property->title . ' ' . $property->size_title)
@else
    @section('title', 'Створити колір')
@endisset
@section('content')
    <style>
        .butt {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title">
                            @isset($property)
                                <h3 class="title"><b> Змінити колір: {{$property->title}}</b></h3>
                            @else
                                <h3 class="title"><b> Створити колір</b></h3>
                            @endisset
                        </div>
                        <form action="
                    @isset($property)
                    {{route('properties.update', $property)}}
                    @else
                    {{route('properties.store')}}
                    @endisset
                    " method="POST" enctype="multipart/form-data">
                            @isset($property)
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="rgb_code">Код(Наприклад: color_123):</label>
                                    @include('layouts.errors', ['fieldName'=>'rgb_code'])
                                    <input value="{{old('rgb_code', isset($property) ? $property->rgb_code :null)}}" class="input" id="rgb_code" name="rgb_code">
                                </div>
                                <div class="form-group">
                                    <label for="title">Назва:</label>
                                    @include('layouts.errors', ['fieldName'=>'title'])
                                    <input value="{{old('title', isset($property) ? $property->title :null)}}" class="input" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="size_title">Назва розміра:</label>
                                    @include('layouts.errors', ['fieldName'=>'size_title'])
                                    <input value="{{old('size_title', isset($property) ? $property->size_title :null)}}" class="input" id="size_title" name="size_title">
                                </div>
                                <button type='submit' class="butt">Збергти</button>
                            @else
                                @csrf
                                <div class="form-group">
                                    <label for="rgb_code">Код(Наприклад: color_123):</label>
                                    @include('layouts.errors', ['fieldName'=>'rgb_code'])
                                    <input value="{{old('rgb_code')}}" class="input" id="rgb_code" name="rgb_code">
                                </div>
                                <div class="form-group">
                                    <label for="title">Назва:</label>
                                    @include('layouts.errors', ['fieldName'=>'title'])
                                    <input value="{{old('title')}}" class="input" id="title" name="title">
                                </div>
                                <button type='submit' class="butt">Стоворити</button>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
