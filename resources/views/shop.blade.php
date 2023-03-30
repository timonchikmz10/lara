@extends('layouts.master')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li class="active">Headphones ({{$products->count()}} Results)</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <form method="GET" action="{{route('shop')}}">
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
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
                                           @else  value="{{$products->min('sale_price')}}" @endif id="price-min"
                                           name="price_min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input @if(request()->price_max != null) value="{{request()->price_max}}"
                                           @else value="{{$products->max('price')}}" @endif id="price-max"
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
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Top selling</h3>
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00
                                        <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00
                                        <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00
                                        <del class="product-old-price">$990.00</del>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                    </div>
                    <!-- /ASIDE -->
                    @csrf
                </form>
                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store products -->
                        <div class="row">

                            <!-- products -->
                            @foreach($products as $product)
                                @include('layouts.card', ['product' => $product])
                            @endforeach
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
