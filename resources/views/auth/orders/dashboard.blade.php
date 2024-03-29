@extends('auth.layouts.master')
@section('title', 'Замовлення')
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
                <div class="col-md-12">
                    @foreach($orders as $order)
                        <h1>№ замовлення:{{$order->id}}</h1>
                        @admin
                        <div style="float:right;">
                            <a type="button"
                               href="{{route('order-show', $order)}}" class="butt">Продивитися замовлення
                            </a>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>
                                    Поле
                                </th>
                                <th>
                                    Значення
                                </th>
                            </tr>
                            <tr>
                                <td>ID замовлення:</td>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <td>ID користувача:</td>
                                <td>{{$order->user_id}}</td>
                            </tr>
                            <tr>
                                <td>Ім'я:</td>
                                <td>{{$order->name}}</td>
                            </tr>
                            <tr>
                                <td>Прізвище:</td>
                                <td>{{$order->second_name}}</td>
                            </tr>
                            <tr>
                                <td>По батькові:</td>
                                <td>{{$order->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <td>Телефон користувача:</td>
                                <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td>ZIP-code:</td>
                                <td>{{$order->zip_code}}</td>
                            </tr>
                            <tr>
                                <td>Місто:</td>
                                <td>{{$order->city}}</td>
                            </tr>
                            <tr>
                                <td>Адреса:</td>
                                <td>{{$order->address}}</td>
                            </tr>
                            <tr>
                                <td>Відділення:</td>
                                <td>{{$order->warehouse}}</td>
                            </tr>
                            <tr>
                                <td>Ціна товарів:</td>
                                <td>{{$order->calculatefullSum()}}</td>
                            </tr>
                            <tr>
                                <td>Ціна доставки:</td>
                                <td>{{$order->delivery_cost}}</td>
                            </tr>
                            <tr>
                                <td>Загальна ціна замовлення:</td>
                                <td>{{$order->calculatefullSum() + $order->delivery_cost}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @else
                            <div style="float:right;">
                                <a type="button"
                                   href="{{route('profile-order-show', $order)}}" class="butt">Продивитися замовлення
                                </a>
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        Поле
                                    </th>
                                    <th>
                                        Значення
                                    </th>
                                </tr>
                                <tr>
                                    <td>ID замовлення:</td>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <td>Ім'я:</td>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <td>Прізвище:</td>
                                    <td>{{$order->second_name}}</td>
                                </tr>
                                <tr>
                                    <td>По батькові:</td>
                                    <td>{{$order->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <td>Телефон користувача:</td>
                                    <td>{{$order->phone}}</td>
                                </tr>
                                <tr>
                                    <td>ZIP-code:</td>
                                    <td>{{$order->zip_code}}</td>
                                </tr>
                                <tr>
                                    <td>Місто:</td>
                                    <td>{{$order->city}}</td>
                                </tr>
                                <tr>
                                    <td>Адреса:</td>
                                    <td>{{$order->address}}</td>
                                </tr>
                                <tr>
                                    <td>Відділення:</td>
                                    <td>{{$order->warehouse}}</td>
                                </tr>
                                <tr>
                                    <td>Ціна товарів:</td>
                                    <td>{{$order->calculatefullSum()}}</td>
                                </tr>
                                <tr>
                                    <td>Ціна доставки:</td>
                                    <td>{{$order->delivery_cost}}</td>
                                </tr>
                                <tr>
                                    <td>Загальна ціна замовлення:</td>
                                    <td>{{$order->calculatefullSum() + $order->delivery_cost}}</td>
                                </tr>
                                </tbody>
                            </table>
                            @endadmin
                            @endforeach
                            {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
