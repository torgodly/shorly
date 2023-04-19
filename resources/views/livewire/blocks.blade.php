<div x-data="{Block: false, ShowSecretMessage:false, CreateButton: @entangle('showCreateButton')}">
    <div class="w-[400px] h-fit flex flex-col justify-center items-center px-2  ">


        <div class="relative w-[90%] ">
            <button @click="Block = !Block"
                    class="border-2 border-dashed border-[#666666] text-[#666666] rounded-lg text-xl font-semibold px-16  w-full  py-2">
                +{{ __('Add Block') }}
            </button>

            <div x-show="Block" @click.outside="Block=false" style="display: none"
                 class="absolute top-full left-0 mt-2 w-fit bg-white border border-gray-200 rounded-lg shadow-lg z-10  ">

                <div class="block px-4 py-5 text-gray-800 hover:bg-gray-200 border-b">
                    <div x-data="{ enabled: {{ $SecretMessage }} }" dir="ltr"
                         @click="enabled = ! enabled"
                         wire:click="StatusToggle()" class="flex gap-5 ">

                        <div :class="{ 'bg-green-500': enabled, 'bg-gray-300': !enabled }"
                             class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                                    <span aria-hidden="true"
                                                                          :class="{ 'translate-x-5': enabled, 'translate-x-0': !enabled }"
                                                                          class=" pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                                                    </span>
                        </div>
                        <h1 class="text-lg font-semibold">{{__('Secret Messages')}}🤫🔐</h1>

                    </div>
                </div>

                <button @click="CreateButton = true, Share=false, Block=false"
                        class="block px-4 py-5 text-gray-800 hover:bg-gray-200 border-b w-full">
                    <div class="flex gap-5">
                        <i class="fa-solid fa-cube text-3xl "></i>
                        <h1 class="text-lg font-semibold">{{__('Add Custom Button')}}</h1>
                    </div>


                </button>
            </div>
        </div>

        @if(Auth::user()->secret_message or $Buttons->isNotEmpty())
            <div class="space-y-5 mt-8  w-[400px] h-fit flex flex-col justify-center px-4">
                @if(Auth::user()->secret_message)
                    <button @click="Block = true, Share=false"
                            class=" grow bg-black min-w-full h-[54px] rounded-xl flex justify-center items-center gap-5">

                        <i class="fa-solid fa-message  text-3xl text-white"></i>
                        <h1 class="text-lg font-bold text-white">{{__('Send Secret Message')}}🤫🔐</h1>

                    </button>
                @endif
                @foreach($Buttons as $button)
                    <button wire:click="edit({{$button->id}})"
                            class=" grow bg-black min-w-full h-[54px] rounded-xl flex justify-center items-center gap-5">

                        <h1 class="text-lg font-bold text-white">{{$button->title}}</h1>

                    </button>

                @endforeach
            </div>

        @endif


    </div>
    <div class="flex items-center justify-center h-full">
        <div class=" bg-white p-8 w-[100%] md:w-[45.6%] fixed bottom-0 rounded-t-3xl z-50"
             x-show='CreateButton' x-swipe:down="CreateButton = false, Share=true"
             @click.outside="CreateButton = false, Share=true"
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
                    <h1 class="font-bold">{{ __('Create Custom Button') }}</h1>
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
                        <input wire:model="customurl" type="text" name="text"
                               class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 text-sm placeholder:text-gray-400 md:text-xl"
                               placeholder="http://url...">
                        @error('customurl')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input wire:model="customtitle" type="text" name="text" dir="auto"
                               class="block w-full h-12 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 text-sm placeholder:text-gray-400 md:text-xl"
                               placeholder="{{__('Title')}}">
                        @error('customtitle')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center">
                        <button dir="auto"
                            class=" grow bg-black w-[50%] h-[54px] rounded-xl text-white text-3xl font-bold">
                            {{$customtitle}}
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
