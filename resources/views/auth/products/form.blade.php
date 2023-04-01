@extends('auth.layouts.master')
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
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title">
                            @isset($product)
                                <h3 class="title"><b> Змінитии товар: {{$product->title}} </b></h3>
                            @else
                                <h3 class="title"><b> Cтворити товар </b></h3>
                            @endisset
                        </div>
                        <form action="
                    @isset($product)
                    {{route('products.update', $product)}}
                    @else
                    {{route('products.store')}}
                    @endisset
                    " method="POST" enctype="multipart/form-data">
                            @isset($product)
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="code"> Код товару(Наприклад: product_title_123)</label>
                            @include('layouts.errors', ['fieldName'=>'code'])
                                    <input class="input" type="text" name="code" id="code"
                                           value="{{old('code', $product->code)}}">
                                </div>
                                <div class="form-group">
                                    <label for="title"> Назва товару</label>
          @include('layouts.errors', ['fieldName'=>'title'])
                                    <input class="input" type="text" name="title" id="title"
                                           value="{{old('title', $product->title)}}">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категорія</label>
                                    <select class="form-control" name="category_id" id="category_id">
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
                                <div class="form-group">
                                    <label for="price">Ціна</label>
                                @include('layouts.errors', ['fieldName'=>'price'])
                                    <input class="input" type="text" name="price" id="price"
                                           value="{{old('price', $product->price)}}">
                                </div>
                                <div class="form-group">
                                    <label for="sale_price">Ціна зі скидкою</label>
                                    @include('layouts.errors', ['fieldName'=>'sale_price'])
                                    <input class="input" type="text" name="sale_price" id="sale_price"
                                           value="{{old('sale_price', $product->sale_price)}}">
                                </div>
                                <div class="form-group">
                                    <label for="count">Кількість товару</label>
                                    @include('layouts.errors', ['fieldName'=>'count'])
                                    <input class="input" type="text" name="count" id="count"
                                           value="{{old('count', $product->count)}}">
                                </div>
                                <div class="order-notice">
                                    <label for="short_description">Короткий опис: </label>
                                   @include('layouts.errors', ['fieldName'=>'short_description'])
                                        <textarea name="short_description" id="short_description" class="input">{{old('short_description', $product->short_description)}}</textarea>
                                </div>
                                <div class="order-notice">
                                    <label for="description">Опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'description'])
                                        <textarea name="description" id="description" class="input">{{old('description', $product->description)}}</textarea>
                                </div>
                                <div class="input-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                    <div class="col-sm-10">
                                        <tr>
                                            @isset($product->image)
                                                <td>Сучасна</td>
                                                <td><img src="{{asset(Storage::url($product->image)) }}"
                                                         style="height: 240px"></td>
                                            @endisset
                                        </tr>
                                        <label class="btn btn-default btn-file">
                                            Завантажити <input type="file" style="display: none;" name="image" id="image">
                                        </label>
                                    </div>
                                </div>
                                @foreach(['hit'=>'Хіт', 'recommended' =>'Рекомендоване', 'new'=>'Нове'] as $field => $title)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="{{$field}}" name="{{$field}}" @if($product->$field === 1)
                                                       checked="checked"
                                        @endif>
                                        @include('layouts.errors', ['fieldName'=>$field])
                                    <label for="{{$field}}">
                                        <span></span>
                                        {{$title}}
                                    </label>
                                </div>
                                @endforeach
                                <button type='submit' class="butt">Зберегти</button>
                            @else
                                @csrf




                                <div class="form-group">
                                    <label for="code"> Код товару(Наприклад: product_title_123)</label>
                                    @include('layouts.errors', ['fieldName'=>'code'])
                                    <input class="input" type="text" name="code" id="code"
                                           value="{{old('code')}}">
                                </div>
                                <div class="form-group">
                                    <label for="title"> Назва товару</label>
                                    @include('layouts.errors', ['fieldName'=>'title'])
                                    <input class="input" type="text" name="title" id="title"
                                           value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категорія</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}">{{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Ціна</label>
                                    @include('layouts.errors', ['fieldName'=>'price'])
                                    <input class="input" type="text" name="price" id="price"
                                           value="{{old('price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="sale_price">Ціна зі скидкою</label>
                                    @include('layouts.errors', ['fieldName'=>'sale_price'])
                                    <input class="input" type="text" name="sale_price" id="sale_price"
                                           value="{{old('sale_price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="count">Кількість товару</label>
                                    @include('layouts.errors', ['fieldName'=>'count'])
                                    <input class="input" type="text" name="count" id="count"
                                           value="{{old('count')}}">
                                </div>
                                <div class="order-notice">
                                    <label for="short_description">Короткий опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'short_description'])
                                    <textarea name="short_description" id="short_description" class="input">{{old('short_description')}}</textarea>
                                </div>
                                <div class="order-notice">
                                    <label for="description">Опис: </label>
                                    @include('layouts.errors', ['fieldName'=>'description'])
                                    <textarea name="description" id="description" class="input">{{old('description')}}</textarea>
                                </div>
                                <div class="input-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Зображення: </label>
                                    <div class="col-sm-10">
                                        <label class="btn btn-default btn-file">
                                            Завантажити <input type="file" style="display: none;" name="image" id="image">
                                        </label>
                                    </div>
                                </div>
                                @foreach(['hit'=>'Хіт', 'recommended' =>'Рекомендоване', 'new'=>'Нове'] as $field => $title)
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="{{$field}}" name="{{$field}}" value="{{old($field)}}">
                                        @include('layouts.errors', ['fieldName'=>$field])
                                        <label for="{{$field}}">
                                            <span></span>
                                            {{$title}}
                                        </label>
                                    </div>
                                @endforeach
                                <button type='submit' class="butt">Зберегти</button>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
