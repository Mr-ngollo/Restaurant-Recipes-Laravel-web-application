<div>
    <livewire:bread-crumb :url="$currentUrl" />
    <!-- Card Section -->
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

    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-slate-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <form wire:submit="save">
                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Add New Category
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-full-name"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Category name
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div>
                            <input type="text" wire:model="category_name" id="af-submit-application-full-name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            @error('category_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Section -->

                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading
                        class="animate-spin hidden inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-green-500"
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Submit and Save
                </button>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>
