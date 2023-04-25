@extends('auth.layouts.master')
@section('title', 'Атрібути')
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
                <a style="float:right;" type="submit" href="{{route('properties.create')}}" class="butt">Додати колір</a>
                <div class="col-md-12">
                    @foreach($properties as $property)
                        <h1>{{$property->title}} {{$property->size_title}}</h1>
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
                                <td>{{ $property->id }}</td>
                            </tr>
                            <tr>
                                <td>RGB код</td>
                                <td>{{ $property->rgb_code }}</td>
                            </tr>
                            <tr>
                                <td>Розір</td>
                                <td>{{ $property->size_title}}</td>
                            </tr>
                            <tr>
                                <td>Назва</td>
                                <td>{{ $property->title}}</td>
                            </tr>
                            </tbody>
                            <div style="float:right">
                                <form method="POST" action="{{route('properties.destroy', $property)}}">
                                    <a style='background-color: #5066da' type="button"
                                       href="{{route('properties.show', $property)}}" class="but">Продивитися
                                    </a>
                                    <a style='background-color: #e8a93a' type="button"
                                       href="{{route('properties.edit', $property)}}" class="but">Змінити колір
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="but"
                                           value="Видалити колір">

                                </form>
                            </div>
                        </table>
                    @endforeach
                    {{$properties->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
