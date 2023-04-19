<div>
    <div class=" flex justify-center items-center ">

        <div
            class="py-6 text-gray-900 flex flex-col justify-center items-center w-screen md:w-[400px]    relative">
            <div class="flex flex-col justify-center items-center ">

                <div class="space-y-4">
                    <div class=" flex flex-col justify-center items-center space-y-4">

                        <div class="px-6 flex justify-center items-center   w-full relative">

                            @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                                <div class="relative">
                                    <img src="{{ asset('images/UserAvatar/' . Auth::user()->id . '.png') }}"
                                         class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
                                </div>
                            @endif
                            <a href="{{route('dashboard')}}">
                                <div class="left-5    cursor-pointer absolute top-4 z-10 no-underline">
                                    <i class="fa-solid fa-circle-arrow-left text-4xl text-[#f4812a]"></i>
                                </div>
                            </a>
                        </div>


                        <div class="px-5  cursor-pointer text-center">
                            <div class="space-y-4 ">
                                <h1 class="font-bold text-3xl font-headings ">{{ Auth::user()->heading?->title }}</h1>
                                <h6 class="font-footer font-medium  text-base ">{{ Auth::user()->heading?->description }}</h6>
                            </div>

                        </div>
                    </div>


                    <div class="space-y-5 mt-8 w-[400px]">
                        <div class="  md:w-full  h-fit flex flex-col justify-center items-center gap-5 p-4 bg-white rounded-lg shadow"
                             x-data="{incomingMessage: true, favorites: false}">

                            <div class="w-full">
                                <nav class="isolate flex justify-between divide-x divide-gray-200  rounded-lg shadow"
                                     aria-label="Tabs">
                                    <button @click="incomingMessage = true; favorites = false"
                                            :class="{ '!bg-[#f4812a]': incomingMessage, 'text-white': incomingMessage }"
                                            class="text-gray-500  rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10 shadow">
                                        <span>{{__("incoming messages")}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>

                                    <button @click="favorites = true; incomingMessage = false"
                                            :class="{ '!bg-[#f4812a]': favorites, 'text-white': favorites, 'shadow-[#f4812a]': favorites }"
                                            class="text-gray-500  rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10 shadow ">
                                        <span>{{__('favorite')}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>
                                </nav>
                            </div>

                            <div x-show="incomingMessage" style="display: none" class="w-full space-y-5">
                                @foreach($messages as $message)
                                    <div class="w-full flex">
                                        <div class="bg-gray-100 space-y-3 px-5 py-2 flex flex-col w-full ">
                                            <div class="flex justify-between items-center ">
                                                <h1 class="text-sm font-semibold">{{__('Anonymous')}}: <span
                                                        class="text-[10px] font-semibold">{{$message->created_at->diffForHumans()}}</span>
                                                </h1>

                                                <svg wire:click="isFavorite({{$message->id}})"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     fill="currentColor"
                                                     class="w-6 h-6   {{ $message->is_favorite ? 'fill-amber-500' : 'fill-gray-400' }} cursor-pointer">
                                                    <path fill-rule="evenodd"
                                                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                          clip-rule="evenodd"/>
                                                </svg>

                                            </div>

                                            <div class="flex justify-center items-center border-y-2">
                                                {{$message->message}}
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="flex justify-center items-center space-x-2">
                                                    <a href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="currentColor"
                                                             class="w-6 h-6  fill-amber-500 cursor-pointer">
                                                            <path
                                                                d="M12 2a10 10 0 00-9.95 9.27 4.01 4.01 0 00.7 3.3 3.98 3.98 0 00-1.8 3.01 4.01 4.01 0 003.3.7A10 10 0 1022 12a9.99 9.99 0 00-10-10zm0 18a8 8 0 01-7.95-7.27 2.01 2.01 0 00-.3-1.73 2 2 0 00-1.4-1.4 2.01 2.01 0 00-1.73-.3A8 8 0 1112 20zm-4-8a2 2 0 11-2-2 2 2 0 012 2zm8 0a2 2 0 11-2-2 2 2 0 012 2z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="currentColor"
                                                             class="w-6 h-6  fill-amber-500 cursor-pointer">
                                                            <path
                                                                d="M12 2a10 10 0 00-9.95 9.27 4.01 4.01 0 00.7 3.3 3.98 3.98 0 00-1.8 3.01 4.01 4.01 0 003.3.7A10 10 0 102
                                                                12a9.99 9.99 0 00-10-10zm0 18a8 8 0 01-7.95-7.27 2.01 2.01 0 00-.3-1.73 2 2 0 00-1.4-1.4 2.01 2.01 0 00-1.73-.3A8 8 0 1112 20zm-4-8a2 2 0 11-2-2 2 2 0 012 2zm8 0a2 2 0 11-2-2 2 2 0 012 2z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <img
                                                src="https://api.dicebear.com/6.x/adventurer/svg?seed={{ str_replace('.', '', $message->ip) }}"
                                                width="50px" height="50px" alt="" srcset="">
                                        </div>
                                    </div>
                                @endforeach
                                {{ $messages->links()}}
                            </div>
                            <div x-show="favorites" style="display: none" class="w-full space-y-5">
                                @if($favorites->isEmpty())
                                    <div class="w-full flex flex-col justify-center items-center border-y-2 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-20 h-20  fill-amber-500 cursor-pointer">
                                            <path
                                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                        </svg>

                                        <h1 class="text-lg font-semibold">{{__('you dont have favorite messages yet')}}</h1>
                                        <h1 class="text-sm font-semibold text-center  ">{{__('click on the heart icon to add a message to your favorites')}}</h1>


                                    </div>
                                @else
                                    @foreach($favorites as $favorite)
                                        <div class="w-full flex">
                                            <div class="bg-gray-100 space-y-3 px-5 py-2 flex flex-col w-full ">
                                                <div class="flex justify-between items-center ">
                                                    <h1 class="text-sm font-semibold">{{__('Anonymous')}}: <span
                                                            class="text-[10px] font-semibold">{{$favorite->created_at->diffForHumans()}}</span>
                                                    </h1>

                                                    <svg wire:click="isFavorite({{$favorite->id}})"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                         fill="currentColor"
                                                         class="w-6 h-6  fill-amber-500 cursor-pointer">
                                                        <path fill-rule="evenodd"
                                                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                              clip-rule="evenodd"/>
                                                    </svg>

                                                </div>

                                                <div class="flex justify-center items-center border-y-2">
                                                    {{$favorite->message}}
                                                </div>

                                                <div class="flex justify-start items-center">
                                                    <button
                                                        class="bg-red-500 text-white px-2 py-1 rounded-md font-semibold text-sm">
                                                        {{__('Delete')}}
                                                    </button>
                                                </div>
                                            </div>
                                            <div>
                                                <img
                                                    src="https://api.dicebear.com/6.x/adventurer/svg?seed={{ str_replace('.', '', $message->ip) }}"
                                                    width="50px" height="50px" alt="" srcset="">
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $favorites->links()}}
                                @endif


                            </div>

                        </div>

                    </div>


                    <div class="mt-10 w-full h-fit flex justify-center px-2">
                        <footer class="flex gap-x-1 justify-center items-center">
                                    <span class="font-footer ">made on <a
                                            href="{{env('APP_URL')}}"><strong>shor.ly</strong></a></span>
                        </footer>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
