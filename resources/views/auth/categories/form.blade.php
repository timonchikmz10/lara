@extends('profile.layouts.master')
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @isset($category)
                        <h1><b> Змінитии категорію: {{$category->title}} </b></h1>
                    @else
                        <h1><b> Cтворити категорію </b></h1>
                    @endisset
                    <form action="
                    @isset($category)
                    {{route('categories.update', $category)}}
                    @else
                    {{route('categories.store')}}
                    @endisset
                    " method="POST">
                        @isset($category)
                            @method('PUT')
                            @csrf
                            <div class="input-group row">
                                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Англ</div>
                                    <input type="text" class="form-control" name="code" id="code"
                                           value="{{$category->code}}">
                                </div>
                            </div>
                            <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="{{$category->title}}">
                                </div>
                            </div>

                            <br>

                            <br>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="description" id="description" cols="72"
                                              rows="7">{{$category->description}}
                                 </textarea>
                                </div>
                            </div>

                            <div class="input-group row">
                                <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-file">
                                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                                    </label>
                                </div>
                            </div>
                        @else
                            @csrf
                            <div class="input-group row">
                                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Англ</div>
                                    <input type="text" class="form-control" name="code" id="code"
                                    >
                                </div>
                            </div>
                            <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <input type="text" class="form-control" name="title" id="title"
                                    >
                                </div>
                            </div>

                            <br>

                            <br>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="description" id="description" cols="72"
                                              rows="7">

                                 </textarea>
                                </div>
                            </div>

                            <div class="input-group row">
                                <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-file">
                                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                                    </label>
                                </div>
                            </div>
                        @endisset
                        <button type='submit' class="butt">Збергти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
