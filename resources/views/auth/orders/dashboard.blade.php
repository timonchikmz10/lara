@extends('profile.layouts.master')
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
    @foreach($orders as $order)
        <div style="padding-bottom: 0 " class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul>
                            <li>ID: {{$order->id}}</li>
                            <li>user_id:{{$order->user_id}}</li>
                            <li>username:{{$order->name}}</li>
                            <li>user_email:{{$order->email}}</li>
                            <li>user_phone:{{$order->phone}}</li>
                            <li>zip_code:{{$order->zip_code}}</li>
                            <li>country:{{$order->country}}</li>
                            <li>city:{{$order->city}}</li>
                            <li>address:{{$order->address}}</li>
                            <li>price:{{$order->fullPrice()}}</li>
                        </ul>
                        @admin
                        <div style="float:right">
                            <a type="button"
                               href="{{route('order-show', $order)}}" class="butt">Продивитися замовлення
                            </a>
                        </div>
                        @else
                            <div style="float:right">
                                <a type="button"
                                   href="{{route('profile-order-show', $order)}}" class="butt">Продивитися замовлення
                                </a>
                            </div>
                            @endadmin
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
