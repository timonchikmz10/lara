@extends('auth.layouts.master')
@section('title', 'Загальна інформація')
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
                @isset($info)
{{--                    @dd($info)--}}
                    <a style="margin-bottom: 30px; margin-top:60px; display: block;  text-align:center;" type="submit" href="{{route('info.edit', $info)}}" class="butt">Змінити загальну
                        інформацію</a>
                    <div class="col-md-12">
                        <h1>Загальна інформація</h1>
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
                                <td>email</td>
                                <td>{{ $info->email }}</td>
                            </tr>
                            <tr>
                                <td>Додатковий email</td>
                                <td>{{ $info->second_email }}</td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td>{{ $info->phone}}</td>
                            </tr>
                            <tr>
                                <td>Додатковий телефон</td>
                                <td>{{ $info->second_phone}}</td>
                            </tr>
                            <tr>
                                <td>Адреса</td>
                                <td>{{ $info->address}}</td>
                            </tr>
                            <tr>
                                <td>Короткий опис</td>
                                <td>{{ $info->short_description }}</td>
                            </tr>
                            <tr>
                                <td>Опис</td>
                                <td>{{ $info->description }}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>Картинка</td>--}}
{{--                                <td><img src="{{asset(Storage::url($category->image)) }}"--}}
{{--                                         style="height: 240px"></td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td>Політика магазину</td>
                                <td>{{ $info->privacy_policy }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <a style="display: block;  text-align:center;" type="submit" href="{{route('info.create')}}" class="butt">Додати загальну
                        інформацію</a>
                @endisset
            </div>
        </div>
    </div>
@endsection
