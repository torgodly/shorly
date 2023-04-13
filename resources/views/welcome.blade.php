<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="antialiased">
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen  bg-center bg-gray-100  bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/page') }}"
                   class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <x-application-logo class="h-24 w-auto bg-gray-900"></x-application-logo>


        </div>

        <div class="mt-16">
            <div class="flex flex-col justify-center items-center">
                <h1 class="font-bold text-4xl text-white">Shor.ly</h1>
                <p class="text-3xl font-semibold text-white text-center" dir="rtl">
                    ماعنديش ما نقول مافكرتش شن بنحط في الصفحه هيا
                    <br>
                    فا الي عنده تصميم مليح تواصل معاي من <a href="http://shor.ly/torgodly" class="text-[#f4812a]">هنا</a>
                    <br>
                    <br>
                    لو تبي تعرف هاذا شني ولله ما عندي نيه نكتبلك شرح
                    <br>
                    فا <a href="{{route('register')}}" class="text-[#f4812a]">سجل</a> وجرب وتو تفهم مهم حاجه مليحه و
                    "بلاش"
                </p>

            </div>
        </div>

        <div class="flex justify-center mt-16 px-0 sm:items-center ">
            <div class="text-center text-sm  text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/torgodly/shorly"
                       class="group inline-flex items-center hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="-mt-px mr-1 w-5 h-5 stroke-gray-600 group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                        made by
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-400 sm:text-right sm:ml-0">
                <a href="http://shor.ly/torgodly" class="px-2">Abdullah Alhajj</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
