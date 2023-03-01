<div>
    <div class="flex justify-between items-center ">
        <button type="button"
            class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-2 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>

        </button>
        <h1 class="font-bold">{{ __('MESSENGERS') }}</h1>
        <button type="button" wire:click="save" @click="Messengers = false"
            class="inline-flex items-center rounded-full border border-transparent bg-green-600 p-2 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>

        </button>

    </div>

    <div class="mt-10 space-y-[16px]">
        {{-- messanger --}}
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                <i class="fa-brands fa-facebook-messenger text-2xl"></i>
            </span>
            <input type="text" name="company-website" id="company-website"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Messenger/Facebook username">
        </div>
        {{-- telegram --}}
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                <i class="fa-brands fa-telegram text-2xl"></i>
            </span>
            <input type="text" name="company-website" id="company-website"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="telegram username">
        </div>
        {{--   whatsapp     --}}
        <div class="mt-1 flex flex-col rounded-md shadow-sm">

            <div class="w-full flex">
                <span
                    class="inline-flex items-center rounded-tl-md roun border border-r-0  border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                </span>
                <input type="number" name="company-website" id="company-website"
                    class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="WhatsApp phone number with country code ( +218...)">
            </div>
            <textarea placeholder="Predefined text: e.g Give me further information about..."
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>


        </div>
        {{--   skype     --}}
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                <i class="fa-brands fa-skype text-2xl"></i>
            </span>
            <input type="text" name="company-website" id="company-website"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="skype username">
        </div>
        {{--    Email    --}}
        <div class="mt-1 flex flex-col rounded-md shadow-sm">
            <div class="flex">
                <span
                    class="inline-flex items-center rounded-tl-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                    <i class="fa-regular fa-envelope text-2xl"></i>
                </span>
                <input type="email" name="company-website" id="company-website"
                    class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-tr-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="Email Address">
            </div>

            <textarea placeholder="subject:"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-b-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>

        </div>
        {{--    phone number    --}}
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                <i class="fa-solid fa-phone text-2xl"></i>
            </span>
            <input type="number" name="company-website" id="company-website"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="phone number with country code ( +218...)">
        </div>
        {{--        viber --}}
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                <i class="fa-brands fa-viber text-2xl"></i>
            </span>
            <input type="number" name="company-website" id="company-website"
                class="block h-11 w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="viber number">
        </div>
    </div>
</div>
