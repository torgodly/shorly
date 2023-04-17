<div x-data="{ Headings: @entangle('showHeadings'), }">
    <div class="px-5 cursor-pointer text-center flex justify-center items-center"
         @click="Headings=true, Share=false">
        @if (empty($title) and empty($description))
            <h1 class="border-b-2 border-dashed border-[#666666] text-[#666666] font-bold font-sans text-3xl w-fit px-2 py-2">
                {{ __('Title Here') }}</h1>
        @else
            <div class="space-y-1 ">
                <h1 class="font-bold text-3xl font-headings ">{{ $title }}</h1>
                <h6 class="font-footer font-medium  text-base ">{{ $description }}</h6>
            </div>
        @endif
    </div>

    <div class="flex items-center justify-center h-full">
        <div class="bg-white p-8 w-full md:w-[45.6%] fixed bottom-0 rounded-t-3xl z-50"
             x-show='Headings' x-swipe:down="Headings = false, Share=true"
             @click.outside="Headings = false, Share=true"
             style="display: none"
             x-transition:enter="transition origin-top ease-out duration-300"
             x-transition:enter-start="transform translate-y-full opacity-0"
             x-transition:enter-end="transform translate-y-0 opacity-100"
             x-transition:leave="transition origin-top ease-out duration-300"
             x-transition:leave-start="transform translate-y-0 opacity-100"
             x-transition:leave-end="transform translate-y-full opacity-0">
            <div>

                <div class="flex justify-between items-center ">
                    <button type="button" wire:click="clear"
                            class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>

                    </button>
                    <h1 class="font-bold">{{ __('TITLE & DESCRIPTION') }}</h1>
                    <button type="button" wire:click="save"
                            class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>

                    </button>

                </div>
                <div class="mt-10 space-y-5">
                    <div>
                        <input wire:model="title" type="text" name="text"
                               class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 text-sm placeholder:text-gray-400 md:text-xl"
                               placeholder="{{__('Title')}}">
                        @error('title')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                                <textarea wire:model="description"
                                          class=" p-2 block w-full h-16 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 text-sm placeholder:text-gray-400 md:text-xl"
                                          placeholder="{{__('Description')}}"></textarea>
                        @error('description')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror

                    </div>

                </div>


            </div>


        </div>

    </div>


</div>
