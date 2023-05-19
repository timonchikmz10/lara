<div class="product">
    <form action="{{route('basket-add', $product)}}" method="POST">
        <a href="{{route('product', [$product->category->code, $product->code])}}">
            <div class="product-img">
                <img src="{{Storage::url($product->image)}}" alt="">
            </div>
            <div class="product-body">
                <p class="product-category"><a href="{{route('category', $product->category->code )}}">{{$product->category->title}}</a></p>
                <h3 class="product-name"><a
                        href="{{route('product', [$product->category->code, $product->code])}}">{{$product->title}}</a>
                </h3>
                @if($product->sale_price != 0)
                    <h4 class="product-price">{{$product->sale_price}} грн
                        <del class="product-old-price">{{$product->price}}</del>
                    </h4>
                @else
                    <h4 class="product-price">{{$product->price}} грн</h4>
                @endif
                @if($product->rating() != 0)
                    <div class="product-rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i > $product->rating())
                                <i class="fa fa-star-o"></i>
                            @else
                                <i class="fa fa-star"></i>
                            @endif
                        @endfor
                    </div>
                @else
                    <div class="product-rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                @endif
                <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                            class="tooltipp">add to wishlist</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                            class="tooltipp">add to compare</span></button>
                    <button class="quick-view"><i class="fa fa-eye"></i><span
                            class="tooltipp">quick view</span></button>
                </div>
            </div>
            <div class="add-to-cart">
                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>До кошика
                </button>
            </div>
        </a>
    </form>
</div>
