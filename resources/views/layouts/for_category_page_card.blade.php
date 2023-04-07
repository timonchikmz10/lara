<form action="{{route('basket-add', $product)}}" method="POST">
    <a href="{{route('product', [$product->category->code, $product->code])}}">
        <div class="col-md-3">
            <div class="product">
                <div class="product-img">
                    <div class="labels">
                        @if($product->isRecommended())
                            <div style="left: 5px; top: 85%" class="product-label">
                                <span class="new-sale">Рекомендуємо</span>
                            </div>
                        @endif
                        @if($product->isHit())
                            <div style="left: 5px" class="product-label">
                                <span class="new">Хіт!</span>
                            </div>
                        @else
                            @if($product->isNew())
                                <div  style="right: 5px" class="product-label">
                                    <span class="new">Новинка</span>
                                </div>
                            @endif
                        @endif
                    </div>
                    <img style="width:100%; aspect-ratio : 1 / 1" src="{{Storage::url($product->image)}}" alt="">
                </div>
                <div class="product-body">
                    <a href="{{route('category', $product->category->code)}}">
                        <p class="product-category">
                            {{$product->category->title}}
                        </p>
                    </a>
                    <h3 class="product-name"><a
                            href="{{route('product', [isset($category) ? $category->code : $product->category->code])}}">{{$product->title}}</a></h3>
                    @if($product->sale_price == 0)
                        <h4 class="product-price">{{$product->price}}</h4>
                    @else
                        <h4 class="product-price">{{$product->sale_price}}
                            <del class="product-old-price">{{$product->price}}</del>
                        </h4>
                    @endif
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                class="tooltipp">add to wishlist</span></button>
                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                class="tooltipp">add to compare</span></button>
                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                    </div>
                </div>
                <div class="add-to-cart">
                    @if($product->isAvailable())
                        <button type= "submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>До кошика</button>
                    @else
                        <div style="color:white">Немає в наявності</div>
                    @endif
                </div>
            </div>
        </div>
    </a>
    @csrf
</form>
