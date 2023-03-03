<div>
    <div class="py-12 flex justify-center ">
        <div class="py-6 text-gray-900 flex flex-col justify-center items-center w-[400px] bg-white">
            <div class="flex flex-col justify-center items-center " x-data="{ Headings: @entangle('showHeadings'), Messengers: @entangle('showMessengers'), SocialLinks: @entangle('showSocialLinks') }">

                <div class="space-y-4">
                    <div class="px-6 flex justify-center items-center ">

                        @if (file_exists('images/UserAvatar/' . Auth::user()->id . '.png'))
                            <div class="relative">
                                <img src="{{ 'images/UserAvatar/' . $imgurl }}"
                                    class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
                                <button wire:click="delete_image"
                                    class="absolute bottom-0 right-0 bg-gray-800/50 rounded-full p-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                </button>
                            </div>
                        @else
                            <button id="select-avatar"
                                class="rounded-full w-[100px] h-[100px] border-dashed border-2 border-[#666666] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </button>
                        @endif
                    </div>


                    <div class="px-6 text-3xl   cursor-pointer text-center" {{--                         wire:poll.1s --}}
                        @click="Headings=!Headings">
                        @if (empty($title) and empty($description))
                            <h1 class="border-b-2 border-dashed border-[#666666] text-[#666666] font-bold font-sans">
                                {{ __('Title Here') }}</h1>
                        @else
                            <div class="space-y-4 ">
                                <h1 class="font-bold font-headings ">{{ $title }}</h1>
                                <span class="font-footer font-medium text-base ">{{ $description }}</span>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="space-y-5 mt-8">
                    <div class="w-[400px] h-fit flex justify-center px-2">
                        @if (empty($messengers->toArray()))
                            <button @click="Messengers = true"
                                class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-bold px-16    py-2">
                                {{ __('+ Add Messengers') }}
                            </button>
                        @else
                            <div class=" w-full flex justify-center flex-wrap-reverse  gap-x-[18px] gap-y-2 ">
                                @foreach ($messengers as $messenger)
                                    @if ($messenger->name == 'messenger')
                                        <button @click="Messengers = true"
                                            class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                                class="fa-brands fa-facebook-messenger text-3xl text-white"></i>
                                        </button>
                                    @elseif($messenger->name == 'phone')
                                        <button @click="Messengers = true"
                                            class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                                class="fa-solid fa-phone text-2xl text-white"></i></button>
                                    @elseif($messenger->name == 'email')
                                        <button @click="Messengers = true"
                                            class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                                class="fa-regular fa-envelope text-2xl text-white"></i>
                                        </button>
                                    @else
                                        <button @click="Messengers = true"
                                            class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl "><i
                                                class="fa-brands fa-{{ $messenger->name }} text-3xl text-white"></i>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="w-[400px] h-fit flex justify-center px-2">
                        @if (empty($sociallinks->toArray()))
                            <button @click="SocialLinks = true"
                                class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-bold px-16    py-2">
                                {{ __('+ Add Social Links') }}
                            </button>
                        @else
                            <div class=" w-full flex justify-center flex-wrap gap-x-5  gap-y-2 ">
                                @foreach ($sociallinks as $sociallink)
                                    <div class=" min-w-[26%] h-[54px]  rounded-xl flex justify-center items-center "><i
                                            @click="SocialLinks = true"
                                            class="fa-brands fa-{{ $sociallink->name }} text-3xl cursor-pointer"></i>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>


                <div class="mt-10 w-full h-fit flex justify-center px-2">
                    <footer class="flex gap-x-1 justify-center items-center">
                        <span class="font-footer ">made by <strong>torgodly</strong></span>
                    </footer>

                </div>


                <div x-show='Headings' x-swipe:down="Headings = false" @click.outside="Headings = false"
                    style="display: none" class=" bg-white p-8 w-[100%] md:w-[45.6%] fixed bottom-0 rounded-t-3xl "
                    x-transition:enter="transition origin-top ease-out duration-300"
                    x-transition:enter-start="transform translate-y-full opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition origin-top ease-out duration-300"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform translate-y-full opacity-0">
                    <div>

                        <div class="flex justify-between items-center ">
                            <button type="button" wire:click="clearHeadings"
                                class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                            </button>
                            <h1 class="font-bold">{{ __('TITLE & DESCRIPTION') }}</h1>
                            <button type="button" wire:click="saveHeadings"
                                class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>

                            </button>

                        </div>
                        <div class="mt-10 space-y-5">
                            <div>
                                <input wire:model="title" type="text" name="text"
                                    class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm placeholder:text-gray-400 md:text-xl"
                                    placeholder="Title">
                                @error('title')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <textarea wire:model="description"
                                    class=" p-2 block w-full h-16 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm placeholder:text-gray-400 md:text-xl"
                                    placeholder="Description"></textarea>
                                @error('description')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>


                    </div>


                </div>

                <div x-show='Messengers' x-swipe:down="Messengers = false" @click.outside="Messengers = false"
                    style="display: none" class=" bg-white p-8 w-[100%] md:w-[45.6%] fixed bottom-0 rounded-t-3xl "
                    x-transition:enter="transition origin-top ease-out duration-300"
                    x-transition:enter-start="transform translate-y-full opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition origin-top ease-out duration-300"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform translate-y-full opacity-0">

                    <div>
                        <div class="flex justify-between items-center ">
                            <button type="button" wire:click="clearMessengers"
                                class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                            </button>
                            <h1 class="font-bold">{{ __('MESSENGERS') }}</h1>
                            <button type="button" wire:click="saveMessengers"
                                class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="Messenger/Facebook username">
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="telegram username">
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="WhatsApp phone number with country code ( +218...)">
                                </div>
                                <textarea placeholder="Predefined text: e.g Give me further information about..." wire:model="whatsapp_message"
                                    class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"></textarea>

                                @error('whatsapp')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                @error('whatsapp_message')
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="skype username">
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="Email Address">

                                </div>

                                <textarea placeholder="subject:" wire:model="email_subject"
                                    class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"></textarea>
                                @error('email')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                @error('email_subject')
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
                                    <input type="number" wire:model="phone_number"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="phone number with country code ( +218...)">
                                </div>

                                @error('phone_number')
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
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium"
                                        placeholder="viber number">
                                </div>

                                @error('viber')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div x-show='SocialLinks' x-swipe:down="SocialLinks = false" @click.outside="SocialLinks = false"
                    style="display: none" class=" bg-white p-8 w-[100%] md:w-[45.6%] fixed bottom-0 rounded-t-3xl "
                    x-transition:enter="transition origin-top ease-out duration-300"
                    x-transition:enter-start="transform translate-y-full opacity-0"
                    x-transition:enter-end="transform translate-y-0 opacity-100"
                    x-transition:leave="transition origin-top ease-out duration-300"
                    x-transition:leave-start="transform translate-y-0 opacity-100"
                    x-transition:leave-end="transform translate-y-full opacity-0">

                    <div>
                        <div class="flex justify-between items-center ">
                            <button type="button" wire:click="clearSocialLinks"
                                class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                            </button>
                            <h1 class="font-bold">{{ __('Social Links') }}</h1>
                            <button type="button" wire:click="saveSocialLinks"
                                class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>

                            </button>

                        </div>

                        <div class="mt-10 space-y-[16px]">
                            {{-- facebook --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-facebook text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="facebook" name="username"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="Facebook username or page id">
                                </div>

                                @error('facebook')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- instagram --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-instagram text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="instagram"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="instagram username">
                                </div>

                                @error('instagram')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--   twitter     --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-twitter text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="twitter"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="twitter username">
                                </div>
                                @error('twitter')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    youtube    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-youtube text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="youtube"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="youtube channel url">
                                </div>

                                @error('youtube')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    tiktok    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-tiktok text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="tiktok"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="tiktok username">
                                </div>

                                @error('tiktok')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    pinterest    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-pinterest text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="pinterest"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="pinterest username">
                                </div>

                                @error('pinterest')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    linkedin    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-linkedin text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="linkedin"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="linkedin profile url">
                                </div>

                                @error('linkedin')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    patreon    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-patreon text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="patreon"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="patreon username">
                                </div>

                                @error('patreon')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--    snapchat    --}}
                            <div class="mt-1 rounded-md shadow-sm">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                        <i class="fa-brands fa-snapchat text-2xl"></i>
                                    </span>
                                    <input type="text" wire:model="snapchat"
                                        class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 text-sm md:text-base placeholder:text-gray-400 font-medium "
                                        placeholder="snapchat username">
                                </div>

                                @error('snapchat')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
