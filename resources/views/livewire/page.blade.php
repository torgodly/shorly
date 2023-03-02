<div>
    <div class="py-12 flex justify-center ">
        <div class="py-6 text-gray-900 flex flex-col justify-center items-center w-[400px] bg-white">
            <div class="flex flex-col justify-center items-center " x-data="{Headings:false, Messengers:false, SocialLinks: false }">

                <div class="space-y-4">
                    <div class="px-6 flex justify-center items-center ">

                        @if(file_exists('images/UserAvatar/'.Auth::user()->id.'.png'))
                            <div wire:poll.keep-alive class="relative">
                                <img src="{{'images/UserAvatar/'.$imgurl}}"
                                     class="rounded-full w-[100px] h-[100px] flex justify-center items-center ">
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
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"/>
                                </svg>
                            </button>
                        @endif
                    </div>


                    <div class="px-6 text-3xl  font-bold font-sans cursor-pointer text-center"
                         wire:poll.keep-alive
                         @click="Headings=!Headings">
                        @if(empty($title) and empty($description))
                            <h1 class="border-b-2 border-dashed border-[#666666] text-[#666666]">{{__('Title Here')}}</h1>

                        @else
                            <div class="space-y-4">
                                <h1>{{$title}}</h1>
                                <h1 class="font-medium text-base ">{{$description}}</h1>
                            </div>

                        @endif
                    </div>
                </div>


                <div class="space-y-5 mt-8">
                    <div class="w-[400px] h-fit flex justify-center px-2">
                        @if(empty($buttons->toArray()))
                            <button @click="Messengers = true"
                                    class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-bold px-16    py-2">
                                {{__('+ Add Messengers')}}
                            </button>
                        @else
                            <div class=" w-full flex justify-center flex-wrap-reverse  gap-x-5 gap-y-2 ">
                                @foreach($buttons as $button)
                                    @if($button->name == 'messenger')

                                        <button @click="Messengers = true"
                                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl"><i
                                                class="fa-brands fa-facebook-messenger text-3xl text-white"></i></button>
                                    @elseif($button->name == 'phone')
                                        <button @click="Messengers = true"
                                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl"><i
                                                class="fa-solid fa-phone text-2xl text-white"></i></button>
                                    @elseif($button->name == 'email')
                                        <button @click="Messengers = true"
                                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl"><i
                                                class="fa-regular fa-envelope text-2xl text-white"></i>
                                        </button>

                                    @else
                                        <button @click="Messengers = true"
                                                class=" grow bg-black min-w-[29.5%] h-[54px] rounded-xl"><i
                                                class="fa-brands fa-{{$button->name}} text-3xl text-white"></i></button>

                                    @endif

                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="w-[400px] h-fit flex justify-center px-2">
                        @if(empty($buttons->toArray()))
                            <button @click="SocialLinks = true"
                                    class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-bold px-16    py-2">
                                {{__('+ Add Social Links')}}
                            </button>
                        @else
                            <div class=" w-full flex justify-center flex-wrap-reverse  gap-x-5 gap-y-2 ">
                            </div>
                        @endif

                    </div>
                </div>



                <div class="mt-10 w-full h-fit flex justify-center px-2">
                  <footer class="flex gap-x-1 justify-center items-center">
                      <p class="text-sm font-sans font-thin ">made by</p> <b class="font-bold ">torgodly</b>
                  </footer>

                </div>



                <div x-show='Headings' x-swipe:down="Headings = false" @click.outside="Headings = false" style="display: none"
                     class=" bg-white p-8 w-[100%] md:w-[45.6%] absolute bottom-0 rounded-t-3xl "
                     x-transition:enter="transition origin-top ease-out duration-300"
                     x-transition:enter-start="transform translate-y-full opacity-0"
                     x-transition:enter-end="transform translate-y-0 opacity-100"
                     x-transition:leave="transition origin-top ease-out duration-300"
                     x-transition:leave-start="transform translate-y-0 opacity-100"
                     x-transition:leave-end="transform translate-y-full opacity-0"
                >
                    @livewire('headings')


                </div>

                <div x-show='Messengers' x-swipe:down="Messengers = false" @click.outside="Messengers = false" style="display: none"
                     class=" bg-white p-8 w-[100%] md:w-[45.6%] absolute bottom-0 rounded-t-3xl "
                     x-transition:enter="transition origin-top ease-out duration-300"
                     x-transition:enter-start="transform translate-y-full opacity-0"
                     x-transition:enter-end="transform translate-y-0 opacity-100"
                     x-transition:leave="transition origin-top ease-out duration-300"
                     x-transition:leave-start="transform translate-y-0 opacity-100"
                     x-transition:leave-end="transform translate-y-full opacity-0"
                >

                    @livewire('messengers')
                </div>

                <div x-show='SocialLinks' x-swipe:down="SocialLinks = false" @click.outside="SocialLinks = false" style="display: none"
                     class=" bg-white p-8 w-[100%] md:w-[45.6%] absolute bottom-0 rounded-t-3xl "
                     x-transition:enter="transition origin-top ease-out duration-300"
                     x-transition:enter-start="transform translate-y-full opacity-0"
                     x-transition:enter-end="transform translate-y-0 opacity-100"
                     x-transition:leave="transition origin-top ease-out duration-300"
                     x-transition:leave-start="transform translate-y-0 opacity-100"
                     x-transition:leave-end="transform translate-y-full opacity-0"
                >

                    @livewire('social-links')
                </div>


            </div>
        </div>
    </div>
</div>
