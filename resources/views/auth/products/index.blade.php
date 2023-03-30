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
                <a style="float:right;" type="submit" href="{{route('products.create')}}" class="butt">Додати категоію</a>
                <div class="col-md-12">
                    @foreach($products as $product)
                        <h1>{{$product->title}}</h1>
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
                            </tbody>
                            <div style="float:right">
                                <form method="POST" action="{{route('products.destroy', $product)}}">
                                    <a style='background-color: #5066da' type="button"
                                       href="{{route('products.show', $product)}}" class="but">Продивитися
                                    </a>
                                    <a style='background-color: #e8a93a' type="button"
                                       href="{{route('products.edit', $product)}}" class="but">Змінити кактегорію
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="but"
                                           value="Видалити категорію">

                                </form>
                            </div>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 0; padding-bottom: 0 " class="py-12">
        <div style="max-width: 12rem" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="--tw-shadow:none;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <a type="submit" href="{{route('products.create')}}" class="butt">Додати товар</a>

            </div>
        </div>
    </div>
    @foreach($products as $product)
    <div style="padding-bottom: 10px; padding-top: 0;" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul>
                    <li>ID: {{$product->id}}</li>
                    <li>Назва продукту: {{$product->title}}</li>
                    <li>Назва категорії: {{$product->category->title}}</li>
                    <li>Ціна: {{$product->price}}</li>
                    <li>Акційна ціна: {{$product->sale_price}}</li>
                    <li>Статус NEW: @if($product->new)
                                так
                                        @else
                        ні
                                        @endif
                    </li>
                </ul>
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
                        <input  type="submit"  class="but"
                                value="Видалити товар">

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="store-filter clearfix">
        <ul class="store-pagination">
            {{$products->links()}}
        </ul>
    </div>
@endsection
