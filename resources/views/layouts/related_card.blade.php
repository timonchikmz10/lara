<div class="col-md-3 col-xs-6">
    <div class="product">
        <form method="post" action="{{route('basket-add', $product->code)}}">
            <a href="{{route('product', [$product->category->code, $product->code])}}">
                <div class="product-img">
                    <img src="{{Storage::url($product->image)}}" alt="">
                    <div class="labels">
                        @if($product->isRecommended())
                            <div style="left: 5px; top: 90%" class="product-label">
                                <span class="new-sale">Рекомендуємо</span>
                            </div>
                        @endif
                        @if($product->isHit())
                            <div style="left: 5px" class="product-label">
                                <span class="new">Хіт!</span>
                            </div>
                        @else
                            @if($product->isNew())
                                <div style="right: 5px" class="product-label">
                                    <span class="new">Новинка</span>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="product-body">
                    <p class="product-category"><a href="{{route('category', $product->category->code)}}">{{$product->category->title}}</a></p>
                    <h3 class="product-name"><a
                            href="{{route('product', [$product->category->code, $product->code])}}">{{$product->title}}</a>
                    </h3>
                    @if($product->sale_price > 0)
                        <h4 class="product-price">{{$product->sale_price}}
                            <del class="product-old-price">{{$product->price}}</del>
                        </h4>
                    @else
                        <h4 class="product-price">{{$product->price}}</h4>
                    @endif
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                class="tooltipp">add to wishlist</span>
                        </button>
                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                class="tooltipp">add to compare</span>
                        </button>
                        <button class="quick-view"><i class="fa fa-eye"></i><span
                                class="tooltipp">quick view</span></button>
                    </div>
                </div>
                <div class="add-to-cart">
                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>до кошика</button>
                </div>
            </a>
        </form>
    </div>
</div>
