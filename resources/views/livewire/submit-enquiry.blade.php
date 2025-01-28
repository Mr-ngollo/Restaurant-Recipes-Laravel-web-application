<!-- Livewire Component -->
<div>
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
            <strong class="font-bold">Success! </strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                onclick="this.parentElement.remove();">
                <span class="text-green-500">&times;</span>
            </button>
        </div>
    @endif

    <form wire:submit.prevent="submitEnquiry">
        <div class="grid gap-4">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="sr-only">First Name</label>
                    <input type="text" wire:model="first_name" id="first_name"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500"
                        placeholder="First Name">
                    @error('first_name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input type="text" wire:model="last_name" id="last_name"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500"
                        placeholder="Last Name">
                    @error('last_name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- End Grid -->

            <div>
                <label for="email" class="sr-only">Email</label>
                <input type="email" wire:model="email" id="email"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500"
                    placeholder="Email">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="sr-only">Phone Number</label>
                <input type="text" wire:model="phone_number" id="phone"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500"
                    placeholder="Phone Number">
                @error('phone_number')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="details" class="sr-only">Details</label>
                <textarea wire:model="message" id="message" rows="4"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500"
                    placeholder="Details"></textarea>
                @error('message')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- End Grid -->

        <div class="mt-4 grid">
            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700">Send
                inquiry</button>
        </div>
    </form>
</div>
