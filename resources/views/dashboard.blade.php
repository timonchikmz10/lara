@extends('profile.layouts.master')
@section('title', 'Профіль')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Ви авторизовані, тут будуть відображені ваші замовлення
                </div>
            </div>
        </div>
    </div>
@endsection
