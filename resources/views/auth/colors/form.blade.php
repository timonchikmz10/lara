@extends('auth.layouts.master')
@isset($color)
    @section( 'title', 'Змінити колір: ' . $color->title)
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
                            @isset($color)
                                <h3 class="title"><b> Змінити колір: {{$color->title}}</b></h3>
                            @else
                                <h3 class="title"><b> Створити колір</b></h3>
                            @endisset
                        </div>
                        <form action="
                    @isset($color)
                    {{route('colors.update', $color)}}
                    @else
                    {{route('colors.store')}}
                    @endisset
                    " method="POST" enctype="multipart/form-data">
                            @isset($color)
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="rgb_code">Код(Наприклад: color_123):</label>
                                    @include('layouts.errors', ['fieldName'=>'rgb_code'])
                                    <input value="{{old('rgb_code', isset($color) ? $color->rgb_code :null)}}" class="input" id="rgb_code" name="rgb_code">
                                </div>
                                <div class="form-group">
                                    <label for="title">Назва:</label>
                                    @include('layouts.errors', ['fieldName'=>'title'])
                                    <input value="{{old('title', isset($color) ? $color->title :null)}}" class="input" id="title" name="title">
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
