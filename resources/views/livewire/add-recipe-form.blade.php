<div>
    <livewire:breadcrumb :url="$currentUrl" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-50">
        <!-- Card -->
        <div class="rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900 bg-slate-100">
            <form wire:submit.prevent="save">
                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Submit your application
                        </h2>
                    </div>
                    <!-- Recipe Name -->
                    <div class="sm:col-span-3">
                        <label for="recipe_name"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe name
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="recipe_name" type="text" wire:model="recipe_name"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm focus:z-10 focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('recipe_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="sm:col-span-3">
                        <label for="recipe_price"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Price
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="recipe_price" type="text" wire:model="recipe_price"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('recipe_price')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="sm:col-span-3">
                        <label for="category_id"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Category
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <select wire:model="category_id" id="category_id"
                            class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md">
                            <option selected disabled>Select Recipe Category</option>
                            <option value="1">Water Melons</option>
                            <option value="2">Tellem</option>
                            <option value="3">Hallahhh</option>
                            <option value="4">WETION</option>
                        </select>
                        @error('category_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- More Details Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            More Details.
                        </h2>
                    </div>

                    <!-- Recipe Image -->
                    <div class="sm:col-span-3">
                        <label for="photo"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe Image
                        </label>
                    </div>
                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress" class="sm:col-span-9">
                        <label for="photo" class="sr-only">Choose Image</label>
                        <input type="file" wire:model="photo" id="photo"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm">
                        @error('photo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- Progress Bar -->
                        <div x-show="uploading">
                            <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                    role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-600 text-xs text-white text-center transition duration-500 dark:bg-green-500"
                                        :style="`width: ${progress}%`">
                                    </div>
                                    <div class="w-6 text-end">
                                        <span class="text-sm text-gray-800 dark:text-white"
                                            x-text="`${progress}%`"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Description -->
                    <div class="sm:col-span-3">
                        <label for="recipe_description"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe Description
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea wire:model="recipe_description" id="recipe_description"
                            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400"
                            rows="6" placeholder="Add the recipe description here."></textarea>
                        @error('recipe_description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Section -->
                <div
                    class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Submit and Save
                    </h2>
                    <div class="mt-5 flex">
                        <input type="checkbox" id="privacy-check"
                            class="shrink-0 mt-0.5 border-gray-300 rounded text-green-600 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-green-500 dark:checked:border-green-500 dark:focus:ring-offset-gray-800">
                        <label for="privacy-check" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Save the
                            recipe details.</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    wire:click="save"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none"
                    wire:loading.attr="disabled">
                    <!-- Loading spinner (initially hidden, visible when submitting) -->
                    <div wire:loading.class.remove="hidden" class="hidden animated-spin rounded-full inline-block w-6 h-6 border-4 border-t-4 border-t-transparent border-white border-solid">
                    </div>

                    <!-- Button text (hidden during loading) -->
                    <span wire:loading.remove>Submit and Save</span>

                    <!-- Spinner text (for accessibility, shown when loading) -->
                    <span class="sr-only" wire:loading>Loading...</span>
                </button>

            </form>
        </div>
    </div>
</div>
