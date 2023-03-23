@extends('layouts.master')
{{--@section('title', 'Перевірка - ' . $product->title)--}}
@section('title', 'Перевірка')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Перевірка</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('index')}}">Головна</a></li>
                        <li><a href="{{route('basket')}}">Кошик</a></li>
                        <li class="active">Перевірка</li>
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
                <form method="POST" action="{{route('order-confirm')}}">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" id="first_name" type="text" name="first_name"
                                       placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input class="input" id="last_name" type="text" name="last_name"
                                       placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input class="input" id="email" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" id="address" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" id="city" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" id="country" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" id="zip_code" type="text" name="zip_code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" id="phone" type="tel" name="phone" placeholder="Telephone">
                            </div>
                            @auth
                                <div class="form-group">

                                </div>
                            @else
                                <div class="form-group">
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="create-account">
                                        <label for="create-account">
                                            <span></span>
                                            Create Account?
                                        </label>
                                        <div class="caption">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt.</p>
                                            <input class="input" type="password" name="password"
                                                   placeholder="Enter Your Password">
                                        </div>
                                    </div>
                                </div>
                        </div>
                            @endauth
                        <!-- /Billing Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" placeholder="Order Notes"></textarea>
                        </div>
                        <!-- /Order notes -->
                    </div>
                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            <div class="order-products">
                                @foreach($order->products as $product)
                                    <div class="order-col">
                                        <div>x{{$product->pivot->count}} {{$product->title}}</div>
                                        <div>₴{{$product->priceForCount()}}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><strong class="order-total">₴{{$order->fullPrice()}}</strong></div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-1">
                                <label for="payment-1">
                                    <span></span>
                                    Direct Bank Transfer
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-2">
                                <label for="payment-2">
                                    <span></span>
                                    Cheque Payment
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-3">
                                <label for="payment-3">
                                    <span></span>
                                    Paypal System
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">
                                <span></span>
                                I've read and accept the <a href="#">terms & conditions</a>
                            </label>
                        </div>

                        <input value='Оформити замовлення' type="submit" class="primary-btn order-submit">
                    @csrf
                </form>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
