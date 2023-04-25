@extends('auth.layouts.master')
@section('title', 'Колір: ' . $property->title . ' розмір ' . $property->size_title )
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
                    <h1>Колір {{ $property->title }} Розмір {{$property->size_title}}</h1>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>
                                Поле
                            </th>
                            <th>
                                Значенння
                            </th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $property->id }}</td>
                        </tr>
                        <tr>
                            <td>Rgb код</td>
                            <td>{{ $property->rgb_code }}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{ $property->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
