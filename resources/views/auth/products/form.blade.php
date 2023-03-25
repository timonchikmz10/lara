@extends('profile.layouts.master')
@isset($product)
    @section( 'title', 'Змінити продукт: ' . $product->title)
@else
    @section('title', 'Створити продукт')
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
                    @isset($product)
                        <h1><b> Змінитии товар: {{$product->title}} </b></h1>
                    @else
                        <h1><b> Cтворити товар </b></h1>
                    @endisset
                    <form action="
                    @isset($product)
                    {{route('products.update', $product)}}
                    @else
                    {{route('products.store')}}
                    @endisset
                    " method="POST">
                        @isset($product)
                            @method('PUT')
                            @csrf
                            <div class="input-group row">
                                <label for="code" class="col-sm-2 col-form-label">Код: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Англ</div>
                                    <input type="text" class="form-control" name="code" id="code"
                                           value="{{$product->code}}">
                                </div>
                            </div>
                            <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="{{$product->title}}">
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Категорія: </label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}"
                                                @if($category->id == $product->category_id)
                                                    selected
                                                    @endif
                                            >{{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Статус NEW: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">(1 або 0)</div>
                                    <input type="text" class="form-control" name="new" id="new"
                                           value="{{$product->new}}">
                                </div>
                            </div>


                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Ціна: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="price" id="price"
                                           value="{{$product->price}}">
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Акційна ціна: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="sale_price" id="sale_price"
                                           value="{{$product->sale_price}}">
                                </div>
                            </div>


                            <br>

                            <br>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Короткий опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="short_description" id="short_description" cols="72"
                                              rows="7">{{$product->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="description" id="description" cols="72"
                                              rows="7">{{$product->description}}</textarea>
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
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Категорія: </label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Статус NEW: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">(1 або 0)</div>
                                    <input type="text" class="form-control" name="new" id="new"
                                           >
                                </div>
                            </div>

                            <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Ціна: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="price" id="price"
                                           >
                                </div>
                            </div>
                        <br>
                            <div class="input-group row">
                                <label for="name" class="col-sm-2 col-form-label">Акційна ціна: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="sale_price" id="sale_price"
                                           >
                                </div>
                            </div>
                            <br>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Короткий опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="short_description" id="short_description" cols="72"
                                              rows="7"></textarea>
                                </div>
                            </div>
                            <div class="input-group row">
                                <label for="description" class="col-sm-2 col-form-label">Опис: </label>
                                <div class="col-sm-6">
                                    <div class="alert alert-danger">Укр</div>
                                    <textarea name="description" id="description" cols="72"
                                              rows="7"></textarea>
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
