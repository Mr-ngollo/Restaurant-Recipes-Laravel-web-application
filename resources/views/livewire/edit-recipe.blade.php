<div>
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-slate-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <form wire:submit.prevent="save">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Edit Recipe Details
                        </h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="recipe-name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe name
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="text" wire:model="recipe_name" id="recipe-name" aria-label="Recipe Name"
                            class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('recipe_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="cooking-time" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Cooking Time (mins)
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="number" wire:model="cooking_time" id="cooking-time"
                            class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('cooking_time')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Ingredients
                        </h2>
                    </div>

                    <div class="sm:col-span-12">
                        @foreach ($ingredients as $index => $ingredient)
                            <div class="flex gap-2 mb-2">
                                <input type="text" wire:model="ingredients.{{ $index }}" placeholder="Ingredient"
                                    class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                <button type="button" wire:click="removeIngredient({{ $index }})" class="text-red-500">&times;</button>
                            </div>
                        @endforeach
                        <button type="button" wire:click="addIngredient" class="text-green-500">+ Add Ingredient</button>
                    </div>
                </div>

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Preparation Steps
                        </h2>
                    </div>

                    <div class="sm:col-span-12">
                        @foreach ($preparation_steps as $index => $step)
                            <div class="flex gap-2 mb-2">
                                <textarea wire:model="preparation_steps.{{ $index }}" rows="2" placeholder="Step"
                                    class="py-2 px-3 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-green-500 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                                <button type="button" wire:click="removeStep({{ $index }})" class="text-red-500">&times;</button>
                            </div>
                        @endforeach
                        <button type="button" wire:click="addStep" class="text-green-500">+ Add Step</button>
                    </div>
                </div>

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            More Details
                        </h2>
                    </div>
                    <!-- End Col -->
					<div class="sm:col-span-3">

                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        @if ($photo && is_string($photo))
                        <img src="{{ asset('storage/photos/' . $photo) }}" alt="recipe image" height="300px" width="300px" class="rounded-lg">
                        @elseif ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="recipe image" height="300px" width="300px" class="rounded-lg">
                        @else
                            <img src="{{ asset('/assets/images/placeholder.png') }}" alt="default image" height="300px" width="300px" class="rounded-lg">
                        @endif
					</div>
                    <!-- End Col -->
                    <div class="sm:col-span-3">
                        <label for="af-submit-application-resume-cv" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Recipe Image
                        </label>
                    </div>
                    <!-- End Col -->

                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = true" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="sm:col-span-9">
                        <label for="file" class="sr-only">Choose Image</label>
                        <input type="file" wire:model="photo" id="file" class="block w-full border  shadow-sm rounded-lg text-sm focus:z-10 focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">
						@error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                        <!-- File Uploading Progress Form -->
                        <div x-show="uploading">
                            <!-- Progress Bar -->
                            <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-green-500" :style="`width: ${progress}%`"></div>
                                </div>
                                <div class="w-6 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white" x-text="`${progress}%`"></span>
                                </div>
                            </div>
                            <!-- End Progress Bar -->
                        </div>
                        <!-- End File Uploading Progress Form -->
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-submit-application-bio" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Recipe description
                            </label>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <textarea id="af-submit-application-bio" wire:model="recipe_description" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="6" placeholder="Add a product description here!"></textarea>
						@error('recipe_description') <span class="text-red-500">{{ $message }}</span> @enderror
					</div>
                    <!-- End Col -->
                </div>
                <!-- End Section -->
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading class="animate-spin hidden inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-green-500" role="status" aria-label="loading">
                      <span class="sr-only">Loading...</span>
                    </div>
                  Submit and Save
                </button>
            </form>
        </div>
    </div>
</div>
