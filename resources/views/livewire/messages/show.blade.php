<div>
    <div class=" flex justify-center items-center ">

        <div
            class="py-6 text-gray-900 flex flex-col justify-center items-center w-screen md:w-[400px]    relative">
            <div class="flex flex-col justify-center items-center ">

                <div class="space-y-4">
                    <div class=" flex flex-col justify-center items-center space-y-4">

                        <div class="px-6 flex justify-center items-center gap-5  w-full relative">
                            <a href="{{route('dashboard')}}">
                                <div class="left-20 absolute  ">
                                    <i class="fa-solid fa-circle-arrow-left text-4xl text-[#f4812a]"></i>
                                </div>
                            </a>
                            @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                                <div class="relative">
                                    <img src="{{ asset('images/UserAvatar/' . Auth::user()->id . '.png') }}"
                                         class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
                                </div>
                            @endif

                        </div>


                        <div class="px-5  cursor-pointer text-center">
                            <div class="space-y-4 ">
                                <h1 class="font-bold text-3xl font-headings ">{{ Auth::user()->heading?->title }}</h1>
                                <h6 class="font-footer font-medium  text-base ">{{ Auth::user()->heading?->description }}</h6>
                            </div>

                        </div>
                    </div>


                    <div class="space-y-5 mt-8">
                        <div class=" md:w-[400px] h-fit flex flex-col justify-center items-center gap-5 p-4 bg-white"
                             x-data="{incomingMessage: true, favorite: false}">

                            <div class="w-full">
                                <nav class="isolate flex justify-between divide-x divide-gray-200  rounded-lg shadow"
                                     aria-label="Tabs">
                                    <button @click="incomingMessage = true; favorite = false"
                                            :class="{ 'bg-gray-700': incomingMessage, 'text-white': incomingMessage }"
                                            class="text-gray-500  rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10">
                                        <span>{{__("incoming messages")}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>

                                    <button @click="favorite = true; incomingMessage = false"
                                            :class="{ 'bg-gray-700': favorite, 'text-white': favorite }"
                                            class="text-gray-500  rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-sm font-medium  focus:z-10">
                                        <span>{{__('Favorite')}}</span>
                                        <span aria-hidden="true"
                                              class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                                    </button>
                                </nav>
                            </div>

                            <div x-show="incomingMessage" style="display: none" class="w-full">
                                <div>

                                </div>
                                <div class="bg-gray-100 px-5 py-2 ">
                                    <div class="flex justify-between items-center ">
                                        <h1 class="text-base">{{__('Anonymous')}}:<span class="text-xs">18 min ago</span></h1>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                  clip-rule="evenodd"/>
                                        </svg>
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
