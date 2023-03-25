@extends('profile.layouts.master')
@section('title', 'Категорії')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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

        .but {
            background-color: #e52828; /* Green */
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
        }
    </style>
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
                        <div style="float:right">
                            <form method="POST" action="{{route('categories.destroy', $category)}}">
                            <a style='background-color: #5066da' type="button"
                               href="{{route('categories.show', $category)}}" class="but">Продивитися
                            </a>
                            <a style='background-color: #e8a93a' type="button"
                                    href="{{route('categories.edit', $category)}}" class="but">Змінити кактегорію
                            </a>
                                @method('DELETE')
                                @csrf
                            <input  type="submit"  class="but"
                                value="Видалити категорію">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="padding-bottom: 0 " class="py-12">
        <div style="max-width: 12rem" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="--tw-shadow:none;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <a type="submit" href="{{route('categories.create')}}" class="butt">Додати категоію</a>

            </div>
        </div>
    </div>
@endsection
