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
    <form method="POST" action="{{route('order-confirm', ['cityTitle' => $cityTitle, 'warehouseTitle' => $warehouseTitle, 'cost' => $forecast['result'][0]['Cost'] ])}}">
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Останній крок</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" id="name" type="text" name="name"
                                       placeholder="Ім'я">
                            </div>
                            <div class="form-group">
                                <input class="input" id="second_name" type="text" name="second_name"
                                       placeholder="Фамілія">
                            </div>
                            <div class="form-group">
                                <input class="input" id="last_name" type="text" name="last_name"
                                       placeholder="Побатькове">
                            </div>
                            <div class="form-group">
                                <input class="input" id="address" type="text" name="address" placeholder="Повна адреса">
                            </div>
                            <div class="form-group">
                                <input class="input" id="zip_code" type="text" name="zip_code"
                                       placeholder="Поштовий індекс">
                            </div>
                            <div class="form-group">
                                <input class="input" id="phone" type="tel" name="phone" placeholder="Телефон">
                            </div>

                            <!-- /Billing Details -->

                            <!-- Order notes -->
                            <div class="order-notes">
                                <textarea class="input" id="notes" name="notes"
                                          placeholder="Додати повідомлення"></textarea>
                            </div>
                            <!-- /Order notes -->
                        </div>
                    </div>
                    <!-- /Order Details -->
                    @auth
                        <div style="margin-top:87px" class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Ваше замовлення</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>ПРОДУКТ</strong></div>
                                    <div><strong>ЦІНА</strong></div>
                                </div>
                                <div class="order-products">
                                    @foreach($order->products as $product)
                                        <div class="order-col">
                                            <div>x{{$product->pivot->count}} {{$product->title}}</div>
                                            <div>₴{{$product->priceForCount()}}</div>
                                        </div>
                                    @endforeach
                                </div>
{{--                                @dd($forecast)--}}
{{--                                @foreach($forecast['result'] as $cost)--}}
{{--                                    {{$cost['Cost']}}--}}
{{--                                @endforeach--}}

                                <div class="order-col">
                                    <div><strong>ЦІНА ЗАМОВЛЕННЯ</strong></div>
                                    <div><strong class="order-total">₴{{$order->calculateFullSum()}}</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>ПРИБЛИЗНА ЦІНА ДОСТАВКИ</strong></div>
                                    <div><strong style="font-size: 24px">₴{{$forecast['result'][0]['Cost']}}</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>ПОВНА ЦІНА</strong></div>
                                    <div><strong class="order-total">₴{{$order->calculateFullSum() + $forecast['result']['0']['Cost']}}</strong></div>
                                </div>
                            </div>
{{--                            <div class="payment-method">--}}
{{--                                <div class="input-radio">--}}
{{--                                    <input type="radio" name="payment" id="payment-1">--}}
{{--                                    <label for="payment-1">--}}
{{--                                        <span></span>--}}
{{--                                        Direct Bank Transfer--}}
{{--                                    </label>--}}
{{--                                    <div class="caption">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                                            tempor--}}
{{--                                            incididunt ut labore et dolore magna aliqua.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="input-radio">--}}
{{--                                    <input type="radio" name="payment" id="payment-2">--}}
{{--                                    <label for="payment-2">--}}
{{--                                        <span></span>--}}
{{--                                        Cheque Payment--}}
{{--                                    </label>--}}
{{--                                    <div class="caption">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                                            tempor--}}
{{--                                            incididunt ut labore et dolore magna aliqua.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="input-radio">--}}
{{--                                    <input type="radio" name="payment" id="payment-3">--}}
{{--                                    <label for="payment-3">--}}
{{--                                        <span></span>--}}
{{--                                        Paypal System--}}
{{--                                    </label>--}}
{{--                                    <div class="caption">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
{{--                                            tempor--}}
{{--                                            incididunt ut labore et dolore magna aliqua.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="terms">--}}
{{--                                <label for="terms">--}}
{{--                                    <span></span>--}}
{{--                                    I've read and accept the <a href="#">terms & conditions</a>--}}
{{--                                </label>--}}
{{--                            </div>--}}

                            <input value='Продовжити' type="submit" class="primary-btn order-submit">
                        </div>
                    @endauth
                </div>

                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
        @csrf
    </form>
@endsection
