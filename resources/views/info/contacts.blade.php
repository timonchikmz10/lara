@extends('layouts.master')
@section('title', 'Контакти')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="store" class="col-md-12">
                    <h1>Контакти</h1>
                    <h5>Телефон:</h5><p>{{$info->phone}}</p>
                    <h5>Додатковий телефон:</h5><p>{{$info->second_phone}}</p>
                    <h5>email:</h5><p>{{$info->email}}</p>
                    <h5>Додатковий email:</h5><p>{{$info->second_email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
