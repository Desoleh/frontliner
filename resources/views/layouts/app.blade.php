<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '| Frontliner') }}</title>

    <!-- Favicons -->
    <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @livewireStyles
</head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-gray-700">
                    {{ $header }}
                </h2>

                {{ $slot }}
            </div>
        </main>
    </div>
</div>
    @livewireScripts
    @wireUiScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>
</body>
</html>
