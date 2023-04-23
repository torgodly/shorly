
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}} - {{$description}}</title>
    <meta name="keywords" content="{{$title}} - {{$description}}">
    <link rel="canonical" href="https://shor.ly/">
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content=" {{$description}}">
    <meta property="og:url" content="https://shor.ly/{{$user->username}}">
    <meta property="og:image" content="https://shor.ly/images/UserAvatar/{{$user->id}}.png">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    {{--        <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@700&display=swap" rel="stylesheet">

    {{--    date picker--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">





    <!-- page Content -->
    <main>
        <livewire:page.show :model="$user">
    </main>
</div>
@livewireScripts
@livewireStyles
</body>
</html>
