<div>
    <div class="flex justify-between items-center ">
        <button type="button" wire:click="clear"
            class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>

        </button>
        <h1 class="font-bold">{{ __('Social Links') }}</h1>
        <button type="button" wire:click="save" @click="SocialLinks = false"
            class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
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
