<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')
    @if(session()->has('success'))
        <div style="text-align: center" class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    @elseif(session()->has('warning'))
        <div style="text-align: center" class="alert alert-warning" role="alert">
            {{session()->get('warning')}}
        </div>
    @endif
{{--    @if (isset($header))--}}
{{--        <header class="bg-white shadow">--}}
{{--            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}
{{--    @endif--}}

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
