@extends('profile.layouts.master')
@section('title', 'Замовлення')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @isset($order_list)
        @foreach($order_list as $order)
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div style="padding-bottom: 0 "  class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Ви авторизовані, тут будуть відображені ваші замовлення
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection
