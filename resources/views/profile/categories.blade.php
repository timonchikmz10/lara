@extends('profile.layouts.master')
@section('title', 'Замовлення')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        @foreach($categories as $category)
            <div style="padding-bottom: 0 " class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <ul>
                                <li>title: {{$category->title}}</li>
                                <li>description:{{$category->description}}</li>
                                <li>code:{{$category->code}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

@endsection
