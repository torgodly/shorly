<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col justify-center items-center">
                    <div class="flex flex-col justify-center items-center" x-data="{Headings:true }">

                        <button  id="select-avatar"
                                class="rounded-full w-[100px] h-[100px] border-dashed border-2 border-[#666666] flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/>
                            </svg>
                        </button>

                        <div @click="Headings=!Headings" class="border-b-2 border-dashed border-[#666666] text-3xl text-[#666666] font-bold font-sans mt-5 cursor-pointer">
                            <h1>{{__('Title Here')}}</h1>
                        </div>

                        <div x-show='Headings' @click.outside="Headings = false" class=" bg-white p-8 w-[100%] md:w-[45.6%] absolute bottom-0 rounded-t-3xl     "
                             x-transition:enter="transition origin-top ease-out duration-300"
                             x-transition:enter-start="transform translate-y-full opacity-0"
                             x-transition:enter-end="transform translate-y-0 opacity-100"
                             x-transition:leave="transition origin-top ease-out duration-300"
                             x-transition:leave-start="transform translate-y-0 opacity-100"
                             x-transition:leave-end="transform translate-y-full opacity-0"
                             >
                            @livewire('headings')
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
