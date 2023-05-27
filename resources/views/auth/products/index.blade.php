@extends('auth.layouts.master')
@section('title', 'Продукти')
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
                <a style="float:right;" type="submit" href="{{route('products.create')}}" class="butt">Створити
                    товар</a>
                <div class="col-md-12">
                    @foreach($products as $product)
                        <h1><a href="{{route('product', [$product->category, $product->code])}}">{{$product->title}}</a>
                        </h1>
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
                                <td>Категорія</td>
                                <td>{{ $product->category->title}}</td>
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
                                <td>Ціна:</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td>Акційна ціна:</td>
                                <td>{{ $product->sale_price }}</td>
                            </tr>
                            <tr>
                                <td>Кількість товару:</td>
                                <td>{{ $product->count }}</td>
                            </tr>
                            <tr>
                                <td>Вага у грамах:</td>
                                <td>{{ $product->weight }}</td>
                            </tr>
                            <tr>
                                <td>Кольори:</td>
                                <td>
                                    @foreach($product->productProperties as $property)
                                        {{\App\Models\Property::where('id',$property->property_id )->first()->title}},
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Створено:</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Остання зміна:</td>
                                <td>{{$product->updated_at}}</td>
                            </tr>
                            </tbody>
                            <div style="float:right">
                                <form method="POST" action="{{route('products.destroy', $product)}}">
                                    <a style='background-color: #5066da' type="button"
                                       href="{{route('products.show', $product)}}" class="but">Продивитися
                                    </a>
                                    <a style='background-color: #e8a93a' type="button"
                                       href="{{route('products.edit', $product)}}" class="but">Змінити товар
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="but"
                                           value="Видалити товар">

                                </form>
                            </div>
                        </table>
                    @endforeach
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
