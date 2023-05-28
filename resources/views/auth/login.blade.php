{{--    <x-guest-layout>--}}
@extends('layouts.master')
@section('title', 'Авторизація')
@section('content')

    <style>

        /* Form Style */
        .form-horizontal {
            background: #fff;
            padding-bottom: 40px;
            border-radius: 15px;
            text-align: center;
        }

        .form-horizontal .heading {
            display: block;
            font-size: 35px;
            font-weight: 700;
            padding: 35px 0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 30px;
        }

        .form-horizontal .form-group {
            padding: 0 40px;
            margin: 0 0 25px 0;
            position: relative;
        }

        .form-horizontal .form-control {
            background: #f0f0f0;
            border: none;
            border-radius: 20px;
            box-shadow: none;
            padding: 0 20px 0 45px;
            height: 40px;
            transition: all 0.3s ease 0s;
        }

        .form-horizontal .form-control:focus {
            background: #e0e0e0;
            box-shadow: none;
            outline: 0 none;
        }

        .form-horizontal .form-group i {
            position: absolute;
            top: 37px;
            left: 60px;
            font-size: 17px;
            color: #c8c8c8;
            transition: all 0.5s ease 0s;
        }

        .form-horizontal .form-control:focus + i {
            color: #00b4ef;
        }

        .form-horizontal .fa-question-circle {
            display: inline-block;
            position: absolute;
            top: 12px;
            right: 60px;
            font-size: 20px;
            color: #808080;
            transition: all 0.5s ease 0s;
        }

        .form-horizontal .fa-question-circle:hover {
            color: #000;
        }

        .form-horizontal .main-checkbox {
            float: left;
            width: 20px;
            height: 20px;
            background: #11a3fc;
            border-radius: 50%;
            position: relative;
            margin: 5px 0 0 5px;
            border: 1px solid #11a3fc;
        }

        .form-horizontal .main-checkbox label {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
        }

        .form-horizontal .main-checkbox label:after {
            content: "";
            width: 10px;
            height: 5px;
            position: absolute;
            top: 5px;
            left: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            background: transparent;
            opacity: 0;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .form-horizontal .forgot-link{
            /*float: right;*/
            padding: 10px 25px;
        }
        .form-horizontal .main-checkbox input[type=checkbox] {
            visibility: hidden;
        }

        .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after {
            opacity: 1;
        }

        .form-horizontal .text {
            float: left;
            margin-left: 7px;
            line-height: 20px;
            padding-top: 5px;
            text-transform: capitalize;
        }

        .form-horizontal .btn {
            float: right;
            font-size: 14px;
            color: #fff;
            background: #00b4ef;
            border-radius: 30px;
            padding: 10px 25px;
            border: none;
            text-transform: capitalize;
            transition: all 0.5s ease 0s;
        }

        @media only screen and (max-width: 479px) {
            .form-horizontal .form-group {
                padding: 0 25px;
            }

            .form-horizontal .form-group i {
                left: 45px;
            }

            .form-horizontal .btn {
                padding: 10px 20px;
            }
        }
    </style>

    <div class="container">
        <div class="row">

            <div class="col-md-offset-3 col-md-6">
                <x-auth-session-status class="mb-4" :status="session('status')"/>
                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                    @csrf
                    <span class="heading">АВТОРИЗАЦІЯ</span>
                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')"/>
                        <input id="email" type="email" class="form-control" name="email" :value="old('email')"
                               required autofocus autocomplete="username"/>
                        <i class="fa fa-user"></i>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <div class="form-group help">
                        <x-input-label for="password" :value="__('Password')"/>
                        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password"/>
                        <i class="fa fa-lock"></i>
{{--                        <a href="#" class="fa fa-question-circle"></a>--}}
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <div class="main-checkbox">
                            <input type="checkbox" id="remember_me" name="remember"/>
                            <label for="remember_me"></label>
                        </div>
                        <span class="text">Запам'ятати мене</span>
                        <button type="submit" class="btn btn-default">Увійти</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" style="margin-top: 10px"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </form>
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
{{--    </x-guest-layout>--}}


<!-- Session Status -->
{{--<x-auth-session-status class="mb-4" :status="session('status')"/>--}}

{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}

{{--    <!-- Email Address -->--}}
{{--    <div>--}}
{{--        <x-input-label for="email" :value="__('Email')"/>--}}
{{--        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"--}}
{{--                      required autofocus autocomplete="username"/>--}}
{{--        <x-input-error :messages="$errors->get('email')" class="mt-2"/>--}}
{{--    </div>--}}

{{--    <!-- Password -->--}}
{{--    <div class="mt-4">--}}
{{--        <x-input-label for="password" :value="__('Password')"/>--}}

{{--        <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                      type="password"--}}
{{--                      name="password"--}}
{{--                      required autocomplete="current-password"/>--}}

{{--        <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
{{--    </div>--}}

{{--    <!-- Remember Me -->--}}
{{--    <div class="block mt-4">--}}
{{--        <label for="remember_me" class="inline-flex items-center">--}}
{{--            <input id="remember_me" type="checkbox"--}}
{{--                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"--}}
{{--                   name="remember">--}}
{{--            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--        </label>--}}
{{--    </div>--}}

{{--    <div class="flex items-center justify-end mt-4">--}}
{{--        @if (Route::has('password.request'))--}}
{{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"--}}
{{--               href="{{ route('password.request') }}">--}}
{{--                {{ __('Forgot your password?') }}--}}
{{--            </a>--}}
{{--        @endif--}}

{{--        <x-primary-button class="ml-3">--}}
{{--            {{ __('Log in') }}--}}
{{--        </x-primary-button>--}}
{{--    </div>--}}
{{--</form>--}}
