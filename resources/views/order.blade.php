@extends('layouts.master')
@section('title', 'Нова пошта: Вибір форми оплати')
@section('content')
    @extends('layouts.master')
    {{--@section('title', 'Перевірка - ' . $product->title)--}}
    @section('title', 'Перевірка')
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
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Перевірка</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('index')}}">Головна</a></li>
                            <li><a href="{{route('basket')}}">Кошик</a></li>
                            <li class="active">Перевірка</li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->

        <!-- SECTION -->
        <form method="POST" action="{{route('city')}}">
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        <div class="col-md-12" style="text-align: center">
                            <!-- Billing Details -->
                            <div class="form-group" style="margin-bottom: 200px; margin-top: 100px">
                                <label>Потрібно вказати коректну назву вашого населеного пункту</label>
                                <input style="margin-bottom: 20px" class="input" id="city" type="text" name="city"
                                       placeholder="Назва міста/cела/селища городського типу">
                                <button type='submit' class="butt">Продовжити</button>
                            </div>

                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->
            @csrf
        </form>
    @endsection

@endsection
