@extends('layouts.master')
@section('meta')
    @include('meta::manager')
@endsection
@section('title' , 'Магазин автотоварів')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <form method="GET" action="{{route('shop')}}" enctype="multipart/form-data">
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="search">
                            <label for="search">Пошук</label>
                            <input type="text" name="search" id="search" class="input" placeholder="Пошук" value="{{old('search')}}">
                        </div>
                        <div class="aside">
                            <h3 class="aside-title">Категорії</h3>
                            <div class="checkbox-filter">
                                @foreach($categories as $category)
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="{{$category->code}}" name="{{$category->code}}"
                                               @if(request()->has($category->code)) checked @endif>
                                        <label for="{{$category->code}}">
                                            <span></span>
                                            {{$category->title}}
                                            <small>{{$category->products->count()}}</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Ціна</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input @if(request()->price_min != null) value="{{request()->price_min}}"
                                           @else  value="{{$price_min}}" @endif id="price-min"
                                           name="price_min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input @if(request()->price_max != null) value="{{request()->price_max}}"
                                           @else value="{{$price_max}}" @endif id="price-max"
                                           name="price_max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="aside">
                            <div class="input-checkbox">
                                <input type="checkbox" name="hit" id="hit"
                                       @if(request()->has('recommended')) checked @endif>
                                <label for="hit">
                                    <span></span>
                                    Хіт
                                </label>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="recommended" name="recommended"
                                   @if(request()->has('recommended')) checked @endif>
                            <label for="recommended">
                                <span></span>
                                Рекомендоване
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="new" name="new" @if(request()->has('new')) checked @endif>
                            <label for="new">
                                <span></span>
                                Новинка
                            </label>
                        </div>
                        <!-- /aside Widget -->
                        <div style="display: inline-block">
                            <button type="submit" class="btn btn-success btn-lg">Пошук</button>
                            <a href="{{route('shop')}}" class="btn btn-danger btn-lg">Скинути </a>
                        </div>

                    </div>
                    <!-- /ASIDE -->
                    @csrf
                </form>
                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store products -->
                        <div class="row">
                            @if(count($products))
                            <!-- products -->
                            @foreach($products as $product)
                                @include('layouts.card', ['product' => $product])
                            @endforeach
                            @else
                                <h1>Нажаль таких товарів не знайдено</h1>
                            @endif
                            <!-- /products -->


                        </div>
                        <!-- /store products -->
                        {{--                            <li class="active">1</li>--}}
                        {{--                            <li><a href="#">2</a></li>--}}
                        {{--                            <li><a href="#">3</a></li>--}}
                        {{--                            <li><a href="#">4</a></li>--}}
                        {{--                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                        <!-- store bottom filter -->
                        <div style="margin-top: 40px; float: right" class="store-filter clearfix">
                            {{$products->links()}}
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
