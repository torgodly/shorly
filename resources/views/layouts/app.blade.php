<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shorly - All Your Links in One Place</title>
    <meta name="keywords" content="Shorly, links, organization, one place, landing page, social media, website, online presence, digital marketing, personal branding, portfolio, bio, contact information, networking, influencers, creators, bloggers, musicians, artists, entrepreneurs, small business">
    <link rel="canonical" href="https://shor.ly/">
    <meta property="og:title" content="Shorly - All Your Important Links in One Place">
    <meta property="og:description" content="Shorly is a platform that helps you collect and organize all your important links in one place. Create your custom Shorly page today!">
    <meta property="og:url" content="https://shor.ly/">
    <meta property="og:image" content="https://shor.ly/images/logo/logo.png">

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

    @if(isset($nav))
        @include('layouts.navigation')
    @endif

    <!-- page page -->
    @if (isset($header))
        <header class="bg-[#FEFEFE] shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
@livewireScripts
@livewireStyles
</body>
</html>
