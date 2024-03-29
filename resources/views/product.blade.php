@extends('layouts.master')
@section('meta')
    @include('meta::manager', [
        'title' =>  $product->title . " Категорія - " . $product->category->title . ' Autozone - Магазин автотоварів',
        'description'   => 'Autozone - Магазиг автотоварів Категорія ' . $product->category->title . ' ' . $product->title,
        'keywords' => $product->title . $product->category->title .
          'Чохли Чехлы Чохол Чехол Обплетення Оплетки Руль Україна Украина Доставка Autozone Автозона Автозон'
    ])
@endsection
@section('title', $product->title)
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('shop')}}">Сторінка магазну</a></li>
                        <li>
                            <a href="{{route('category', [$product->category->code])}}">{{$product->category->title}}</a>
                        </li>
                        <li><a href="">{{$product->title}}</a></li>
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
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{Storage::url($product->image)}}" alt="">
                        </div>
                        @foreach($product->thumbnails()->get() as $thumbnail)
                            <div class="product-preview">
                                <img src="{{Storage::url($thumbnail->image)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product main img -->


                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{Storage::url($product->image)}}" alt="">
                        </div>
                        @foreach($product->thumbnails()->get() as $thumbnail)
                            <div class="product-preview">
                                <img src="{{Storage::url($thumbnail->image)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$product->title}}</h2>
                        <div>
                            <div class="product-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i > $product->rating())
                                        <i class="fa fa-star-o"></i>
                                    @else
                                        <i class="fa fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <div>
                            @if($product->sale_price > 0)
                                <h3 class="product-price">{{$product->sale_price}} грн
                                    <del class="product-old-price">{{$product->price}}</del>
                                </h3>
                            @else
                                <h3 class="product-price">{{$product->price}} грн</h3>
                            @endif
                            @if($product->isAvailable())
                                <span class="product-available">В наявності</span>
                            @else
                                <span style="color: grey" class="product-available"> Немає в наявності</span>
                            @endif
                        </div>
                        <p>{{$product->short_description}}</p>
                        @if($product->isAvailable())
                            <form action="{{route('basket-add', $product)}}" method="POST">
                                <div class="product-options">
                                    <label>
                                        Колір
                                        <select class="input-select" name="property_id" id="property_id">
                                            @foreach($properties as $property)
                                                    <option
                                                        value="{{$property->id}}">{{$property->title}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>

                                <div class="add-to-cart">
                                    <div class="qty-label">
                                        Кількість
                                        <div class="input-number">
                                            <input value="{{old('count', 1)}}" name="count" id="count" type="number">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                    </div>
                                    @method('POST')
                                    @csrf
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> до
                                        кошика
                                    </button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('subscription', $product) }}" method="GET">
                                <div class="add-to-cart">
                                    @csrf
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Очікувати
                                        товар
                                    </button>
                                </div>
                            </form>
                        @endif

                        <ul class="product-links">
                            <li>Категорія:</li>
                            <li>
                                <a href="{{route('category', $product->category->title)}}">{{$product->category->title}}</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Опис</a></li>
                        <li><a data-toggle="tab" href="#tab2">Деталі</a></li>
                        <li><a data-toggle="tab" href="#tab3">Відгуки(3)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Кольоры: @foreach($properties as $property) {{$property->title}} @endforeach</p>
                                    <p>Вага: {{$product->weight}} гр.</p>
                                    <p>Розмір: {{$product->size}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->
                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{$product->rating()}}</span>
                                            <div class="rating-stars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i > $product->rating())
                                                        <i class="fa fa-star-o"></i>
                                                    @else
                                                        <i class="fa fa-star"></i>
                                                    @endif
                                                @endfor

                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$product->percentRating(5)}}%;"></div>
                                                </div>
                                                <span class="sum">{{$comments->where('mark', 5)->count()}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$product->percentRating(4)}}%;"></div>
                                                </div>
                                                <span class="sum">{{$comments->where('mark', 4)->count()}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$product->percentRating(3)}}%;"></div>
                                                </div>
                                                <span class="sum">{{$comments->where('mark', 3)->count()}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$product->percentRating(2)}}%;"></div>
                                                </div>
                                                <span class="sum">{{$comments->where('mark', 2)->count()}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{$product->percentRating(1)}}%;"></div>
                                                </div>
                                                <span class="sum">{{$comments->where('mark', 1)->count()}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->
                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach($comments as $comment)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{$users->where('id', $comment->user_id)->first()->name}}</h5>
                                                        <p class="date">{{$comment->updated_at}}</p>
                                                        <div class="review-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i > $comment->mark)
                                                                    <i class="fa fa-star-o empty"></i>
                                                                @else
                                                                    <i class="fa fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$comment->text}}</p>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                        {{$comments->links()}}
                                        {{--                                        <ul class="reviews-pagination">--}}
                                        {{--                                            <li class="active">1</li>--}}
                                        {{--                                            <li><a href="#">2</a></li>--}}
                                        {{--                                            <li><a href="#">3</a></li>--}}
                                        {{--                                            <li><a href="#">4</a></li>--}}
                                        {{--                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                        {{--                                        </ul>--}}
                                    </div>
                                </div>
                                <!-- /Reviews -->
                                <!-- Review Form -->
                                @auth
                                    @isset($com)
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form" method="POST"
                                                      action="{{route('comment-update' , $product)}}">
                                                    <textarea class="input" id="text" name="text"
                                                              placeholder="Ваш відгук">{{$com->text}}</textarea>
                                                    <div class="input-rating">
                                                        <span>Ваша оцінка: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5"
                                                                   type="radio"><label
                                                                for="star5"></label>
                                                            <input id="star4" name="rating" value="4"
                                                                   type="radio"><label
                                                                for="star4"></label>
                                                            <input id="star3" name="rating" value="3"
                                                                   type="radio"><label
                                                                for="star3"></label>
                                                            <input id="star2" name="rating" value="2"
                                                                   type="radio"><label
                                                                for="star2"></label>
                                                            <input id="star1" name="rating" value="1"
                                                                   type="radio"><label
                                                                for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="primary-btn">Оновити відгук</button>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form" method="POST"
                                                      action="{{route('comment' , $product)}}">
                                                    <textarea class="input" id="text" name="text"
                                                              placeholder="Ваш відгук"></textarea>
                                                    <div class="input-rating">
                                                        <span>Ваша оцінка: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5"
                                                                   type="radio"><label
                                                                for="star5"></label>
                                                            <input id="star4" name="rating" value="4"
                                                                   type="radio"><label
                                                                for="star4"></label>
                                                            <input id="star3" name="rating" value="3"
                                                                   type="radio"><label
                                                                for="star3"></label>
                                                            <input id="star2" name="rating" value="2"
                                                                   type="radio"><label
                                                                for="star2"></label>
                                                            <input id="star1" name="rating" value="1"
                                                                   type="radio"><label
                                                                for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="primary-btn">Залишити відгук</button>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    @endisset
                                @else
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <a class="primary-btn" href="{{route('login')}}"> Авторизуватися</a>
                                        </div>
                                    </div>
                                @endauth
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Товары з цієї категорії</h3>
                    </div>
                </div>
                @foreach($products as $product)
                    @if($product->isAvailable())
                        @include('layouts.related_card', compact('product'))
                    @endif
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

@endsection
