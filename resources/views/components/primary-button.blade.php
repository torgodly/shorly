<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-fit items-center px-4 py-2 bg-[#f4812a] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#f9a826] focus:bg-[#f9a826] active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
