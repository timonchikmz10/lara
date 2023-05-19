@extends('layouts.master')
@section('title', 'Політика магазину')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="store" class="col-md-12">
                    <h1>Політика магазину</h1>
                    <p>{{$info->privacy_policy}}</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
