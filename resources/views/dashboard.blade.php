<x-app-layout>
    <x-slot name="nav">

    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  relative" x-data="{qr: false}">
            <div class="flex justify-center items-center gap-5 flex-col  w-full mb-2">
                <a href="{{route('page.edit')}}"
                   class="bg-[#f4812a] hover:bg-[#DE8C1B] text-white font-bold py-2 px-4 rounded-2xl w-full text-center flex justify-center items-center gap-2">
                    {{__('Edit My Page')}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                    </svg>
                </a>
                <a href="{{route('message.index')}}"
                   class="bg-blue-500  text-white font-bold py-2 px-4 rounded-2xl w-full text-center flex justify-center items-center gap-2">
                    {{__('My Messages')}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97-1.94.284-3.916.455-5.922.505a.39.39 0 00-.266.112L8.78 21.53A.75.75 0 017.5 21v-3.955a48.842 48.842 0 01-2.652-.316c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-h-screen relative">
                <div class="p-6 text-gray-900 space-y-5">
                    <div class="flex justify-between" >
                        <div class="flex">
                            @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                                <img src="{{ 'images/UserAvatar/' . Auth::user()->id . '.png' }}"
                                     class="w-14 h-14 rounded-full" id="avatar" alt="{{Auth::user()->username}}">

                            @else
                                <img src="https://api.dicebear.com/6.x/notionists/svg?seed={{Auth::user()->username}}"
                                     alt="Avatar" class="w-14 h-14  rounded-full" id="avatar" alt="{{Auth::user()->username}}">

                            @endif

                            <div class="flex gap-5 justify-center items-center ml-4">
                                <p class="text-xl  font-semibold text-[#f4812a] ">{{ substr(Auth::user()->link(), 0, 20) . '...' }}</p>
                                <div class="flex gap-3 justify-center items-center">
                                    <button>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"/>
                                        </svg>
                                    </button>


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
