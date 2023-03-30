@extends('auth.layouts.master')
@section('title', 'Категорії')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                <a style="float:right;" type="submit" href="{{route('categories.create')}}" class="butt">Додати категоію</a>
                <div class="col-md-12">
                    @foreach($categories as $category)
                        <h1>{{$category->title}}</h1>
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
                                <td>Кол-во товаров:</td>
                                <td>{{ $category->products->count() }}</td>
                            </tr>
                            </tbody>
                            <div style="float:right">
                                <form method="POST" action="{{route('categories.destroy', $category)}}">
                                    <a style='background-color: #5066da' type="button"
                                       href="{{route('categories.show', $category)}}" class="but">Продивитися
                                    </a>
                                    <a style='background-color: #e8a93a' type="button"
                                       href="{{route('categories.edit', $category)}}" class="but">Змінити кактегорію
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="but"
                                           value="Видалити категорію">

                                </form>
                            </div>
                        </table>
                    @endforeach
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
