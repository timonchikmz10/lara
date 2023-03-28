@extends('profile.layouts.master')
@section('title', 'Замовлення №' . $order->id)
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

        .but {
            background-color: #e52828; /* Green */
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
        }
    </style>
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
                    @foreach($order->products as $product)
                        <div class="col-md-12">
                            <h1>Категорія {{ $product->title }}</h1>
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
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Код</td>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                <tr>
                                    <td>Назва</td>
                                    <td>{{ $product->title}}</td>
                                </tr>
                                <tr>
                                    <td>Категорія(id)</td>
                                    <td>{{ $product->category->title}}({{$product->category->id}})</td>
                                </tr>
                                <tr>
                                    <td>Статус NEW:</td>
                                    <td>
                                        @if($product->new)
                                            так
                                        @else
                                            ні
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td>Опис</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Картинка</td>
                                    <td><img style="height: 240px" src="{{ Storage::url($product->image) }}"
                                        ></td>
                                </tr>
                                <tr>
                                    <td>Короткий опис</td>
                                    <td>{{ $product->short_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ціна:</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Акційна ціна:</td>
                                    <td>{{ $product->sale_price }}</td>
                                </tr>
                                <tr>
                                    <td>Створено:</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Остання зміна:</td>
                                    <td>{{$product->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td>Загальна ціна зміна:</td>
                                    <td>{{$product->priceForCount()}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
