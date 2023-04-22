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
                            <div class="space-y-4 " dir="auto">
                                <h1 class="font-bold text-3xl font-headings ">{{ Auth::user()->heading?->title }}</h1>
                                <h6 class="font-footer font-medium  text-base ">{{ Auth::user()->heading?->description }}</h6>
                            </div>

                        </div>
                    </div>


                    <div class="space-y-5 mt-8 w-[400px] md:w-[600px]">
                        <div
                            class="  md:w-full  h-fit flex flex-col justify-center items-center gap-5 p-4 bg-white rounded-lg shadow"
                            x-data="{incomingMessage: true, favorites: false, Delete: @entangle('delete')}">

                            <div class="w-full">
                                <nav class="isolate flex justify-between divide-x divide-gray-200  rounded-lg shadow"
                                     aria-label="Tabs">
                                    <button @click="incomingMessage = true; favorites = false"
                                            :class="{ '!bg-[#f4812a]': incomingMessage, 'text-white': incomingMessage }"
                                            class="text-gray-500  ltr:rounded-l-lg rtl:rounded-r-lg  group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10 shadow">
                                        <span>{{__("incoming messages")}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>

                                    <button @click="favorites = true; incomingMessage = false"
                                            :class="{ '!bg-[#f4812a]': favorites, 'text-white': favorites, 'shadow-[#f4812a]': favorites }"
                                            class="text-gray-500  ltr:rounded-r-lg rtl:rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10 shadow ">
                                        <span>{{__('favorite messages')}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>
                                </nav>
                            </div>

                            <div x-show="incomingMessage" style="display: none" class="w-full space-y-5">
                                @if($messages->isEmpty())
                                    <div class="w-full flex flex-col justify-center items-center border-y-2 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-20 h-20  fill-amber-500 cursor-pointer">
                                            <path fill-rule="evenodd"
                                                  d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97-1.94.284-3.916.455-5.922.505a.39.39 0 00-.266.112L8.78 21.53A.75.75 0 017.5 21v-3.955a48.842 48.842 0 01-2.652-.316c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97z"
                                                  clip-rule="evenodd"/>
                                        </svg>

                                        <h1 class="text-lg font-semibold">{{__('you dont have secret messages yet')}}</h1>
                                        <h1 class="text-sm font-semibold text-center  ">{{__('share your link to get more messages')}}</h1>


                                    </div>
                                @else
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
                                                        <path
                                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                                    </svg>
                                                </div>

                                                <p class="flex justify-center items-center border-y-2" dir="auto">
                                                    {{$message->message}}
                                                </p>

                                                <div class="flex justify-self-auto gap-2 items-center">

                                                    <button wire:click="showDelete({{$message->id}})"
                                                            class="bg-red-500 text-white px-3 py-1 rounded-lg font-semibold text-sm">
                                                        {{__('Delete')}}
                                                    </button>
                                                    {{--                                                TODO: add share message--}}
                                                    {{--                                                <button--}}
                                                    {{--                                                    class="bg-blue-500 text-white px-3 py-1 rounded-lg font-semibold text-sm flex gap-2">--}}
                                                    {{--                                                    {{__('Share')}}--}}
                                                    {{--                                                    <i class="fa-solid fa-share text-xl"></i>--}}


                                                    {{--                                                </button>--}}

                                                </div>
                                            </div>
                                            <div>
                                                <img
                                                    src="https://api.dicebear.com/6.x/adventurer/svg?seed={{ str_replace('.', '', $message->ip) }}"
                                                    width="50px" height="50px" alt="" srcset="">
                                            </div>


                                        </div>

                                    @endforeach

                                @endif
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
                                                        <path
                                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                                    </svg>

                                                </div>

                                                <p class="flex justify-center items-center border-y-2" dir="auto">
                                                    {{$favorite->message}}
                                                </p>

                                                <div class="flex justify-start items-center">
                                                    <button wire:click="showDelete({{$message->id}})"
                                                            class="bg-red-500 text-white px-3 py-1 rounded-lg font-semibold text-sm">
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
                            <div x-show="Delete" style="display: none" class="fixed z-10 inset-0  overflow-y-auto">
                                <div class="fixed z-10 inset-0 overflow-y-auto flex items-center justify-center">

                                    <!-- Background overlay -->
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <!-- Popup container -->
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                                        <!-- Popup header -->
                                        <div class="bg-red-500 px-4 py-3">
                                            <h2 class="text-lg font-medium text-white">Delete Message</h2>
                                        </div>

                                        <!-- Popup body -->
                                        <div class="px-4 py-5 sm:p-6">
                                            <p class="text-gray-700">
                                                Are you sure you want to delete this message? This action cannot be undone.
                                            </p>
                                        </div>

                                        <!-- Popup buttons -->
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button wire:click="delete({{$messageId}})" type="button"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Delete
                                            </button>
                                            <button @click="Delete = false" type="button"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                                Cancel
                                            </button>
                                        </div>

                                    </div>

                                </div>
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
