    <x-app-layout>
    <x-slot name="nav">

    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  relative" x-data="{qr: false}">
            <div class="flex justify-center items-center gap-5 flex-col  w-full mb-2">
                <x-primary-button onclick="location.href='{{route('page.edit')}}'"
                    class="!text-xl w-2/3 flex justify-center items-center">
                    {{__('Edit My Page')}}

                </x-primary-button>
                <x-primary-button onclick="location.href='{{route('message.index')}}'"
                    class="!text-xl bg-blue-500 hover:bg-blue-400 w-2/3 flex justify-center items-center">
                    {{__('My Messages')}}

                </x-primary-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-h-screen relative">
                <div class="p-6 text-gray-900 space-y-5">
                    <div class="flex justify-between" dir="ltr" >
                        <div class="flex justify-center items-center w-full">
                            @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                                <img src="{{ 'images/UserAvatar/' . Auth::user()->id . '.png' }}"
                                     class="w-14 h-14 rounded-full" id="avatar" alt="{{Auth::user()->username}}">
                            @else
                                <img src="https://api.dicebear.com/6.x/notionists/svg?seed={{Auth::user()->username}}"
                                     alt="Avatar" class="w-14 h-14  rounded-full" id="avatar" alt="{{Auth::user()->username}}">
                            @endif
                            <div class="flex gap-5 justify-center items-center ml-4">
                                <p class="text-xl  font-semibold text-[#f4812a] ">{{ substr(Auth::user()->link(), 0, 20) . '...' }}</p>
                                <div class="">
                                    <button @click="qr=!qr">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z"/>
                                        </svg>
                                    </button>

                                </div>

                            </div>
                        </div>


                    </div>

                    @livewire('page.chart')

                </div>

            </div>
            <div class=" bg-gray-100 p-8 w-[100%] md:w-[45.6%] h-fit absolute inset-0 z-50 rounded-3xl mx-auto my-auto"
                 x-show='qr'
                 @click.outside="qr = false"
                 style="display: none"
                 x-transition:enter="transition origin-top ease-out duration-300"
                 x-transition:enter-start="transform translate-y-full opacity-0"
                 x-transition:enter-end="transform translate-y-0 opacity-100"
                 x-transition:leave="transition origin-top ease-out duration-300"
                 x-transition:leave-start="transform translate-y-0 opacity-100"
                 x-transition:leave-end="transform translate-y-full opacity-0">

                <div class="flex flex-col justify-center items-center space-y-5">
                    <h1 class="text-[#f4812a] text-2xl font-bold ">Shor.ly</h1>
                    <h1 class="text-lg" id="UserLink">https://{{Auth::user()->link()}}</h1>
                    <div id="canvas"></div>
                    <div class="flex gap-5">
                        <button type="button" id="PNG" style="background: #f4812a"
                                class="inline-flex items-center gap-x-1.5 rounded-md  py-1.5 px-10 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                            PNG
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"/>
                            </svg>

                        </button>
                        <button type="button" id="SVG" style="background: #f4812a"
                                class="inline-flex items-center gap-x-1.5 rounded-md  py-1.5 px-10 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
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

        </div>

    </div>

</x-app-layout>
