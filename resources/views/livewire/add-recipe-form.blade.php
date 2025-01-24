<div>
    <livewire:breadcrumb :url="$currentUrl" />
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-50">
        <!-- Card -->
        <div class="rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900 bg-slate-100">
            <form wire:submit="save">
                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Submit your application
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-full-name"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe name
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="af-submit-application-full-name" type="text"
                                wire:model ="recipe_name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('recipe_name') <span class="text-red-500">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-email"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Price
                        </label>
                    </div>
                    <!-- End Col -->



                    <div class="sm:col-span-9">
                        <input id="af-submit-application-phone" type="text"
                            wire:model ="recipe_price"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            @error('recipe_price') <span class="text-red-500">{{$message}}</span>@enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                          Category
                        </label>
                      </div>
                      <!-- End Col -->

                      <div class="sm:col-span-9">
                        <select name="" id="" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md">
                            <option selected="">Select Recipe Category</option>
                            <option>water melons</option>
                            <option>Tellem</option>
                            <option>HALLLAHHH</option>
                            <option>WETION</option>
                        </select>
                        @error('category_id') <span class="text-red-500">{{$message}}</span>@enderror
                      </div>
                    </div>
                </div>


                <!-- Section -->
                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            More Details.
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="recipe_image"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe image
                        </label>
                    </div>
                    <!-- End Col -->

                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="uploading = $event.detail.progress" class="sm:col-span-9">
                        <label for="af-submit-application-resume-cv" wire:model="photo" class="sr-only">Choose
                            Image</label>
                        <input type="file" name="af-submit-application-resume-cv" wire:model="photo"
                            id="file"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
              file:bg-gray-50 file:border-0
              file:bg-gray-100 file:me-4
              file:py-2 file:px-4
              dark:file:bg-neutral-700 dark:file:text-neutral-400">
              @error('recipe_photo') <span class="text-red-500">{{$message}}</span>@enderror

                        {{-- File uploading progress form  --}}
                        <div x-show="uploading">
                            {{-- progress bar  --}}
                            <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                    role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-600 text-xs text-white texet-center whitespace-nowrap transition duration-500 dark:bg-green-500"
                                        :style="`width: ${progress}%`">
                                    </div>
                                    <div class="w-6 text-end">
                                        <span class="text-sm text-gray-800 dark:text-white" x-text="`${progress}%`"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-submit-application-bio"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Recipe description
                            </label>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <textarea
                            wire:model ="recipe_description"
                            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6" placeholder="Add the recipe description here."></textarea>
                            @error('recipe_description') <span class="text-red-500">{{$message}}</span>@enderror
                    </div>
                    <!-- End Col -->
                </div>


                <!-- Section -->
                <div
                    class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Submit and save
                    </h2>


                    <div class="mt-5 flex">
                        <input type="checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded text-green-600 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-green-500 dark:checked:border-green-500 dark:focus:ring-offset-gray-800"
                            id="af-submit-application-privacy-check">
                        <label for="af-submit-application-privacy-check"
                            class="text-sm text-gray-500 ms-2 dark:text-neutral-400">save the recipe details.</label>
                    </div>
                </div>
                <!-- End Section -->

                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading class="animated-spin rounded-full inline-block size-4 border-[3px] border-current ">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Submit and save
                </button>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->

</div>
