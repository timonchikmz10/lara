@extends('layouts.master')
@section('title', 'Нова пошта: Обрати відділення')
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
                    @foreach($warehouses['result'] as $warehouse)
                        <form action="{{route('order-info', $warehouse['CityRef'])}}">
                            <tr>
                                <td>
                                    {{$warehouse['Description']}}
                                </td>
                                <td>
                                    {{$warehouse['ShortAddress']}}
                                </td>
                                <td>
                                    {{$warehouse['SettlementDescription']}}
                                </td>
                                <td>
                                    {{$warehouse['SettlementRegionsDescription']}}
                                </td>
                                <td>
                                    {{$warehouse['SettlementAreaDescription']}}
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
