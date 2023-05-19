@extends('layouts.master')
@section('title', 'О нас')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="store" class="col-md-12">
                    <h1>О нас</h1>
                    <p>{{$info->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
