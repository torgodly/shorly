



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$user->name}} </title>
    <meta property="og:title" content="صارحني برسالة سرية {{$user->name}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://shor.ly/{{$user->username}}/message">
    <meta property="og:image" content="{{asset('images/logo/SecretMessage.jpg')}}">
    <meta property="og:image:width" content="737">
    <meta property="og:image:height" content="384">
    <meta name="description" content="ارسل لي رسالة سرية دون أن أعرف من انت , انقر هنا وادخل الصندوق السري الخاص بي , كن صادقاُ معي">

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
        @if(session('Success'))
            <div x-data="{ show: {{ session('Success') ? 'true' : 'false' }} }"
                 x-show.transition.duration.1000ms="show" @click.away="show = false"
                 x-init="setTimeout(() => { show = false }, 5000)" class="relative">
                <div class="pointer-events-none absolute top-0 left-0 right-0 mt-2 flex justify-center"
                     x-show="show">
                    <div class="rounded-full bg-green-500 uppercase px-4 py-1 text-xs font-bold text-white mr-3">
                        {{ session('Success') }}
                    </div>
                </div>
            </div>

        @endif

        <div class=" flex justify-center items-center ">

            <div
                class="py-6 text-gray-900 flex flex-col justify-center items-center w-screen md:w-[400px]    relative">
                <div class="flex flex-col justify-center items-center ">

                    <div class="space-y-4">
                        <div class=" flex flex-col justify-center items-center space-y-4">

                            <div class="px-6 flex justify-center items-center gap-5  w-full relative">
                                <a href="{{route('page.show', $user->username)}}">
                                    <div class="left-20 absolute  ">
                                        <i class="fa-solid fa-circle-arrow-left text-4xl text-[#f4812a]"></i>
                                    </div>
                                </a>
                                @if (file_exists('images/UserAvatar/' . $user->id . '.png'))
                                    <div class="relative">
                                        <img src="{{ asset('images/UserAvatar/' . $user->id . '.png') }}"
                                             class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
                                    </div>
                                @endif

                            </div>


                            <div class="px-5  cursor-pointer text-center">
                                <div class="space-y-4 ">
                                    <h1 class="font-bold text-3xl font-headings ">{{ $user->heading?->title }}</h1>
                                    <h6 class="font-footer font-medium  text-base ">{{ $user->heading?->description }}</h6>
                                </div>

                            </div>
                        </div>


                        <div class="space-y-5 mt-8">
                            <div class="w-screen md:w-[400px] h-fit flex justify-center px-4">
                                <form action="{{route('message.store', $user->username)}}" method="post"
                                      class="flex flex-col gap-5 justify-center items-center">
                                    @csrf
                                    <textarea name="message" maxlength="500" dir="auto"
                                              class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-[#f4812a] min-w-[400px] min-h-[200px]"
                                              placeholder="{{__('Type your message here')}}"
                                              style="border-color: #f4812a;"></textarea>
                                    <button type="submit"
                                            class="py-2 px-4 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                                        Submit
                                    </button>

                                </form>
                            </div>

                        </div>


                        <div class="mt-10 w-full h-fit flex justify-center px-2">
                            <footer class="flex gap-x-1 justify-center items-center">
                                    <span class="font-footer ">made on <a
                                            href="https://{{env('APP_URL')}}"><strong>shor.ly</strong></a></span>
                            </footer>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@livewireScripts
@livewireStyles
</body>
</html>
