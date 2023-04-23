<x-app-layout>
    @if(session('Success'))
        <div x-data="{ show: {{ session('Success') ? 'true' : 'false' }} }"
             x-show.transition.duration.1000ms="show" @click.away="show = false"
             x-init="setTimeout(() => { show = false }, 5000)" class="relative">
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-green-500 mr-4" role="button"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Check</title>
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">{{ session('Success') }}</p>
                    </div>
                </div>
                <div class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title>
                        <path
                            d="M14.348 5.652c-.512-.512-1.342-.512-1.854 0L10 8.146 7.506 5.652c-.512-.512-1.342-.512-1.854 0s-.512 1.342 0 1.854L8.146 10l-2.494 2.494c-.512.512-.512 1.342 0 1.854.256.256.597.384.927.384s.67-.128.927-.384L10 11.854l2.494 2.494c.512.512.512 1.342 0 1.854-.256.256-.597.384-.927.384s-.67-.128-.927-.384L10 13.854l-2.494 2.494c-.256.256-.597.384-.927.384s-.67-.128-.927-.384c-.512-.512-.512-1.342 0-1.854L8.146 12 5.652 9.506c-.512-.512-1.342-.512-1.854 0s-.512 1.342 0 1.854L6.854 12l-2.494 2.494c-.512.512-.512 1.342 0 1.854.256.256.597.384.927.384s.67-.128.927-.384L8.146 13.854l2.494 2.494c.256.256.597.384.927.384s.67-.128.927-.384c.512-.512.512-1.342 0-1.854L11.854 12l2.494-2.494c.512-.512.512-1.342 0-1.854z"/>
                    </svg>
                </div>
            </div>
            <div class="pointer-events-none absolute top-0 left-0 right-0 mt-2 flex justify-center"
                 x-show="show">
                <div class="rounded-full bg-green-500 uppercase px-4 py-1 text-xs font-bold text-white mr-3">
                    Success
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
</x-app-layout>



