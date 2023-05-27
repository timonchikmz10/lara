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
                        @admin
                        <tr>
                            <td>ID користувача:</td>
                            <td>{{$order->user_id}}</td>
                        </tr>
                        @endadmin
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
                            @admin
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
                            @else
                                <tr>
                                    <td>Категорія</td>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                            @endadmin
                            <tr>
                                @admin
                                <td>Картинка</td>
                                @endadmin
                                <td><img style="height: 240px" src="{{ Storage::url($product->image) }}"
                                    ></td>
                            </tr>
                            <tr>
                                <td>Ціна:</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            @if($product->sale_price != 0)
                            <tr>
                                <td>Акційна ціна:</td>
                                <td>{{ $product->sale_price }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Кількість товару:</td>
                                <td>{{ $product->pivot->counter}}</td>
                            </tr>
                            <tr>
                                <td>Колір</td>
                                <td>{{\App\Models\Property::where('id', $product->pivot->color_id)->first()->title}}</td>
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
