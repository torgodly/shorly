<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'shorly') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
    {{--        <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    <!-- page Content -->
    <main>
        <livewire:page.show :model="$user">
    </main>

</div>
@livewireScripts
</body>
</html>
