@extends('auth.layouts.master')
@section('title', 'Кольори')
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
                <a style="float:right;" type="submit" href="{{route('colors.create')}}" class="butt">Додати колір</a>
                <div class="col-md-12">
                    @foreach($colors as $color)
                        <h1>{{$color->title}}</h1>
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
                                <td>{{ $color->id }}</td>
                            </tr>
                            <tr>
                                <td>RGB код</td>
                                <td>{{ $color->rgb_code }}</td>
                            </tr>
                            <tr>
                                <td>Назва</td>
                                <td>{{ $color->title}}</td>
                            </tr>
                            </tbody>
                            <div style="float:right">
                                <form method="POST" action="{{route('colors.destroy', $color)}}">
                                    <a style='background-color: #5066da' type="button"
                                       href="{{route('colors.show', $color)}}" class="but">Продивитися
                                    </a>
                                    <a style='background-color: #e8a93a' type="button"
                                       href="{{route('colors.edit', $color)}}" class="but">Змінити колір
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="but"
                                           value="Видалити колір">

                                </form>
                            </div>
                        </table>
                    @endforeach
                    {{$colors->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
