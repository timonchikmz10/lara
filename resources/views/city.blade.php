@extends('layouts.master')
@section('title', 'Нова пошта: Назва населеного пункту')
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
    </style>
    <div class="section">
        <div class="container">
            <div class="row">
                <table class="table">
                    <tbody>
                    @foreach($cities['result'] as $city)
                        <form action="{{route('warehouse', [ 'city' => $city['Ref'], 'cityTitle' => $city['Description'] ])}}">
                    <tr>
                    <td>
                        {{$city['Description']}}
                    </td>       <td>
                            {{$city['RegionsDescription']}}
                    </td>
                        <td>
                            {{$city['AreaDescription']}}
                        </td>
                        <td>
                            <button type='submit' class="butt">Обрати</button>
                        </td>
                    </tr>
                            @csrf
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
