@extends('auth.layouts.master')
@isset($category)
    @section( 'title', 'Змінити категорію: ' . $category->title)
@else
    @section('title', 'Створити категорію')
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
                            @isset($category)
                            <h3 class="title"><b> Змінити категорію: {{$category->title}}</b></h3>
                            @else
                                <h3 class="title"><b> Створити категорію</b></h3>
                            @endisset
                        </div>
                        <form action="
                    @isset($category)
                    {{route('categories.update', $category)}}
                    @else
                    {{route('categories.store')}}
                    @endisset
                    " method="POST" enctype="multipart/form-data">
                        @isset($category)
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="code">Код(Наприклад: category_123):</label>
                                @include('layouts.errors', ['fieldName'=>'code'])
                                <input value="{{old('code', isset($category) ? $category->code :null)}}" class="input" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="title">Назва:</label>
                                @include('layouts.errors', ['fieldName'=>'title'])
                                <input value="{{old('title', isset($category) ? $category->title :null)}}" class="input" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Опис:</label>
                                @include('layouts.errors', ['fieldName'=>'description'])
                                <input value="{{old('description', isset($category) ? $category->description :null)}}" class="input" id="description" name="description">
                            </div>

                            <div class="input-group row">
                                <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                <div class="col-sm-10">
                                    <tr>
                                        <td>Сучасна</td>
                                        <td><img src="{{asset(Storage::url($category->image)) }}"
                                                 style="height: 240px"></td>
                                    </tr>
                                    <label class="btn btn-default btn-file">
                                        Завантажити <input type="file" style="display: none;" name="image" id="image">
                                    </label>
                                </div>
                            </div>
                            <button type='submit' class="butt">Збергти</button>
                        @else
                            @csrf
                            <div class="form-group">
                                <label for="code">Код(Наприклад: category_123):</label>
                                @include('layouts.errors', ['fieldName'=>'code'])
                                <input value="{{old('code')}}" class="input" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="title">Назва:</label>
                                @include('layouts.errors', ['fieldName'=>'title'])
                                <input value="{{old('title')}}" class="input" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Опис:</label>
                                @include('layouts.errors', ['fieldName'=>'description'])
                                <input value="{{old('description')}}" class="input" id="description" name="description">
                            </div>

                            <div class="input-group row">
                                <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-file">
                                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                                    </label>
                                </div>
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
