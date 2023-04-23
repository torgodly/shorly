<div class="">
    <div class="pb-12 flex justify-center ">
        <div class="py-6 text-gray-900 flex flex-col justify-center items-center w-[400px]  rounded-xl z-50">
            <div class="flex flex-col justify-center items-center mb-5 "
                 x-data="{    qr: false,  }">
                <div class="space-y-4 w-full">
                    <div class="px-6 flex justify-center items-center  w-full relative">
                        @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                            <div class="relative">
                                <img src="{{ 'images/UserAvatar/' . $imgurl }}"
                                     class="rounded-full w-[100px] h-[100px] flex justify-center items-center" >

                                <button wire:click="delete_image"
                                        class="absolute bottom-0 right-0 bg-gray-800/50 rounded-full p-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                    </svg>

                                </button>
                            </div>
                        @else
                            <button id="select-avatar"
                                    class="rounded-full w-[100px] h-[100px] border-dashed border-2 border-[#666666] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/>
                                </svg>
                            </button>
                        @endif

                        <a href="{{route('dashboard')}}" class="left-5 text-white text-sm font-medium bg-black bg-opacity-60 rounded-full px-3 py-0.5 cursor-pointer absolute top-4 z-10 no-underline">
                            {{__('Insights')}}
                        </a>
                        <a href="{{route('profile.edit')}}" class="right-5 text-white text-sm font-medium bg-black bg-opacity-60 rounded-full px-3 py-0.5 cursor-pointer absolute top-4 z-10 no-underline">
                            {{__('Settings')}}
                        </a>
                    </div>

                    @livewire('headings')

                </div>


                <div class="space-y-5 mt-8">
                    @livewire('messengers')
                    @livewire('blocks')
                    @livewire('social-links')
                </div>


                <div class="mt-10 w-full h-fit flex justify-center px-2">
                    <footer class="flex gap-x-1 justify-center items-center">
                        <span class="font-footer ">made on <a
                                href="https://{{env('APP_URL')}}"><strong>shor.ly</strong></a></span>
                    </footer>

                </div>


                <div x-show='qr'
                     @click.outside="qr = false"
                     style="display: none" class=" bg-white p-8 w-[100%] md:w-[45.6%] fixed top-[15%]   rounded-3xl "
                     x-transition:enter="transition origin-top ease-out duration-300"
                     x-transition:enter-start="transform translate-y-full opacity-0"
                     x-transition:enter-end="transform translate-y-0 opacity-100"
                     x-transition:leave="transition origin-top ease-out duration-300"
                     x-transition:leave-start="transform translate-y-0 opacity-100"
                     x-transition:leave-end="transform translate-y-full opacity-0">

                    <div class="flex flex-col justify-center items-center space-y-5">
                        <h1 class="text-[#f4812a] text-2xl font-bold ">Shor.ly</h1>
                        <h1 class=" text-lg " id="UserLink" title="{{Auth::user()->username}}">https://{{Auth::user()->link()}}</h1>
                        <div id="canvas"></div>
                        <div class="flex gap-5">
                            <button type="button" id="PNG"
                                    class="inline-flex items-center gap-x-1.5 rounded-md bg-orange-600 py-1.5 px-10 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                                PNG
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"/>
                                </svg>

                            </button>
                            <button type="button" id="SVG"
                                    class="inline-flex items-center gap-x-1.5 rounded-md bg-orange-600 py-1.5 px-10 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                                SVG
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"/>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>


                <div dir="ltr"
                    class="  bg-white p-2 w-[100%] md:w-[45.6%] h-[72px] fixed bottom-0 rounded-t-3xl shadow-2xl "
                    x-transition:enter="transition origin-top ease-out duration-300"
                    x-transition:enter-start="transform translate-y-full opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition origin-top ease-out duration-300"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform translate-y-full opacity-0">
                    <div class="flex items-center gap-2">
                        <x-application-logo class="block h-14 w-auto fill-current text-gray-800"/>
                        <div
                            class="flex justify-start items-center w-full h-10 rounded-full border-0 px-4 shadow-sm ring-1 ring-inset ring-gray-300 ">
                            <button x-clipboard.raw="https://{{Auth::user()->link()}}"
                                    class="text-[#f4812a] text-base hover:underline">{{Auth::user()->link()}}</button>
                        </div>
                        <button @click="qr=true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-7 h-7 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z"/>
                            </svg>

                        </button>

                        <a href="https://{{Auth::user()->link()}}" target="_blank"
                           class="rounded-full bg-[#f4812a] p-2 text-white shadow-sm hover:bg-[#f4812a] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f4812a]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>

                        </a>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
