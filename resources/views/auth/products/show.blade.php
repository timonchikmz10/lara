@extends('profile.layouts.master')
@section('title', 'Редагування товара: ' . $product->title)
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
            {{--            <tr>--}}
            {{--                <td>Картинка</td>--}}
            {{--                <td><img src="{{ Storage::url($category->image) }}"--}}
            {{--                         height="240px"></td>--}}
            {{--            </tr>--}}
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
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Створено:</td>
                <td>{{ $product->created_at }}</td>
            </tr>
            <tr>
                <td>Остання зміна:</td>
                <td>{{$product->updated_at}}</td>
            </tr>
            <a style='background-color: #e8a93a' type="button"
               href="{{route('products.edit', $product)}}" class="but">Змінити товар
            </a>
            </tbody>
        </table>
    </div>
@endsection
