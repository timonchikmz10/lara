@extends('auth.layouts.master')
@section('title', 'Категорія: ' . $category->title)
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
                    <h1>Категория {{ $category->title }}</h1>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>
                                Поле
                            </th>
                            <th>
                                Значение
                            </th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td>Код</td>
                            <td>{{ $category->code }}</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{ $category->title}}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                        <tr>
                            <td>Картинка</td>
                            <td><img src="{{asset(Storage::url($category->image)) }}"
                                     style="height: 240px"></td>
                        </tr>
                        <tr>
                            <td>Кол-во товаров:</td>
                            <td>{{ $category->products->count() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
