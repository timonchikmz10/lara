@extends('master')
@section('title', 'Кошик')
@section('content')
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                @foreach($order->products as $product)
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class='product_cart_image'>
                                                    <img class="img-fluid mx-auto d-block image"
                                                         src="/img/product01.png">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a href="{{route('product', [ $product->category->code, $product->code])}}">{{$product->title}}</a>
                                                                <div class="product-info">
                                                                    <div>Display: <span class="value">5 inch</span>
                                                                    </div>
                                                                    <div>RAM: <span class="value">4GB</span></div>
                                                                    <div>Memory: <span class="value">32GB</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 quantity">
                                                            <div class="input-group">
                                                                <form style = "display: inline-block;" action="{{route('basket-remove', $product)}}" method="POST">
                                                                    <button type="submit"  class="button-minus" >-</button>
                                                                @csrf
                                                                </form>
                                                                <input style="left:0px" readonly value="{{$product->pivot->count}}" type="number" step="1" max="" name="quantity" class="quantity-field">
                                                                <form style = "display: inline-block " action="{{route('basket-add', $product)}}" method="POST">
                                                                    <button type="submit"  class="button-plus" >+</button>
                                                                @csrf
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3 price">
                                                            <span>{{$product->priceForCount()}} ₴</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <div class="summary-item"><span class="text">Subtotal</span><span
                                        class="price">$360</span></div>
                                <div class="summary-item"><span class="text">Discount</span><span
                                        class="price">$0</span></div>
                                <div class="summary-item"><span class="text">Shipping</span><span
                                        class="price">$0</span></div>
                                <div class="summary-item"><span class="text">Total</span><span class="price">₴{{ $order->fullPrice() }}</span>
                                </div>
                                <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
