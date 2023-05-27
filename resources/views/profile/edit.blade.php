
@extends('auth.layouts.master')
@section('title', 'Редагувати профіль')
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
                <div class="form-group">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="form-group">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
