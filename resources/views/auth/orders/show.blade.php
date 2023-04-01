@extends('auth.layouts.master')
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
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h1>№ замовлення:{{$order->id}}</h1>
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
                            <td>Ім'я користувача:</td>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <td>Email користувача:</td>
                            <td>{{$order->email}}}</td>
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
                            <td>Ціна замовлення:</td>
                            <td>{{$order->calculatefullSum()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @foreach($products as $product)
                    <div class="col-md-12">
                        <h1>Товар: {{ $product->title }}</h1>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>
                                    Поле
                                </th>
                                <th>
                                    Значення
                                </th>
                            <tr>
                                <td>Назва</td>
                                <td>{{ $product->title}}</td>
                            </tr>
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
                                <td>Категорія(id)</td>
                                <td>{{ $product->category->title}}({{$product->category->id}})</td>
                            </tr>
                            <tr>
                                <td>Картинка</td>
                                <td><img style="height: 240px" src="{{ Storage::url($product->image) }}"
                                    ></td>
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
                                <td>Кількість товару:</td>
                                <td>{{ $product->pivot->count}}</td>
                            </tr>
                            <tr>
                                <td>Загальна ціна:</td>
                                <td>{{$product->priceForCount()}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
