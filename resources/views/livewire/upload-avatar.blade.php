<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <form wire:submit.prevent="save">
                    <input type="file" wire:model="photo">
                 
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                 
                    <button type="submit">Save Photo</button>
                </form>
            </div>
        </div>
    </div>
</div>



