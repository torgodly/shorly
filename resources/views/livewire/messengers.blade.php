<div x-data="{  Messengers: @entangle('showMessengers'), }">
    <div class="w-[400px] h-fit flex justify-center px-2">
        @if (empty($messengers->toArray()))
            <button @click="Messengers = true, Share=false"
                    class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-bold px-16 w-[90%]   py-2">
                +{{ __('Add Messengers') }}
            </button>
        @else
            <div class=" w-full flex justify-center flex-wrap-reverse  gap-x-[18px] gap-y-4 ">
                @foreach ($messengers as $messenger)
                    @if ($messenger->name == 'messenger')
                        <button @click="Messengers = true, Share=false"
                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                class="fa-brands fa-facebook-messenger text-3xl text-white"></i>
                        </button>
                    @elseif($messenger->name == 'phone')
                        <button @click="Messengers = true, Share=false"
                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                class="fa-solid fa-phone text-2xl text-white"></i></button>
                    @elseif($messenger->name == 'email')
                        <button @click="Messengers = true, Share=false"
                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                class="fa-regular fa-envelope text-2xl text-white"></i>
                        </button>
                    @else
                        <button @click="Messengers = true, Share=false"
                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                class="fa-brands fa-{{ $messenger->name }} text-3xl text-white"></i>
                        </button>
                    @endif
                @endforeach
            </div>
        @endif

    </div>
    <div class="flex items-center justify-center h-full">
        <div class="bg-white p-8 w-full md:w-[45.6%] fixed bottom-0 rounded-t-3xl z-50 "
             x-show='Messengers' x-swipe:down="Messengers = false, Share=true"
             @click.outside="Messengers = false, Share=true"
             style="display: none"
             x-transition:enter="transition origin-top ease-out duration-300"
             x-transition:enter-start="transform translate-y-full opacity-0"
             x-transition:enter-end="transform translate-y-0 opacity-100"
             x-transition:leave="transition origin-top ease-out duration-300"
             x-transition:leave-start="transform translate-y-0 opacity-100"
             x-transition:leave-end="transform translate-y-full opacity-0">

            <div class="">
                <div class="flex justify-between items-center ">
                    <button type="button" wire:click="clear"
                            class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>

                    </button>
                    <h1 class="font-bold">{{ __('MESSENGERS') }}</h1>
                    <button type="button" wire:click="save"
                            class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>

                    </button>

                </div>

                <div class="mt-10 space-y-[16px]">
                    {{-- messenger --}}
                    <div class="mt-1 rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-facebook-messenger text-2xl"></i>
                                    </span>
                            <input type="text" wire:model="messenger"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                   placeholder="{{__('Messenger/Facebook username')}}">
                        </div>

                        @error('messenger')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- telegram --}}
                    <div class="mt-1 rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-telegram text-2xl"></i>

                                    </span>
                            <input type="text" wire:model="telegram"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('telegram username')}}">
                        </div>

                        @error('telegram')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--   whatsapp     --}}
                    <div class="mt-1 flex-col rounded-md shadow-sm">
                        <div class="w-full flex">
                                    <span
                                        class="inline-flex items-center rounded-tl-md roun border border-r-0  border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-whatsapp text-2xl"></i>
                                    </span>
                            <input type="number" wire:model="whatsapp"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('WhatsApp phone number with country code ( +218...)')}}">
                        </div>
                        <textarea placeholder="{{__('Predefined text: e.g Give me further information about...')}}"
                                  wire:model="whatsappMessage"
                                  class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"></textarea>

                        @error('whatsapp')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                        @error('whatsappMessage')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror

                    </div>
                    {{--   skype     --}}
                    <div class="mt-1 rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-skype text-2xl"></i>
                                    </span>
                            <input type="text" wire:model="skype"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('Skype Username')}}">
                        </div>

                        @error('skype')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--    Email    --}}
                    <div class="mt-1 flex-col rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-tl-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-regular fa-envelope text-2xl"></i>
                                    </span>
                            <input type="email" wire:model="email"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('Email Address')}}">

                        </div>

                        <textarea placeholder="{{__('Subject:')}}" wire:model="emailSubject"
                                  class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"></textarea>
                        @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                        @error('emailSubject')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--    phone number    --}}
                    <div class="mt-1 rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-solid fa-phone text-2xl"></i>

                                    </span>
                            <input type="number" wire:model="phone"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('phone number with country code ( +218...)')}}">
                        </div>

                        @error('phone')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--        viber --}}
                    <div class="mt-1 rounded-md shadow-sm">
                        <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-viber text-2xl"></i>
                                    </span>
                            <input type="number" wire:model="viber"
                                   class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-orange-500 focus:ring-orange-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                   placeholder="{{__('viber number')}}">
                        </div>

                        @error('viber')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>

{{--            @if($loading)--}}

{{--                <div class=" absolute inset-0  flex flex-col items-center justify-center bg-gray-100/50">--}}

{{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--                    <p class="text-gray-500 text-2xl font-bold">Saving...</p>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>

    </div>

</div>
