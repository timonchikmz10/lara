@extends('auth.layouts.master')
@section('title', 'Колір: ' . $color->title)
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
                    <h1>Колір {{ $color->title }}</h1>
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
                            <td>{{ $color->id }}</td>
                        </tr>
                        <tr>
                            <td>Rgb код</td>
                            <td>{{ $color->rgb_code }}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{ $color->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
