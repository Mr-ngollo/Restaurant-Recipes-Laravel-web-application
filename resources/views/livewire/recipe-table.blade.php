<!-- Table Section -->
<div>
    <livewire:bread-crumb :url="$currentUrl" />
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Recipe
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Add Recipe, edit and more.
                                </p>
                            </div>

                            <div class="inline-flex gap-x-2">
                                <div class="max-w-md space-y-3">
                                    <input type="search" wire:model.live.debounce.300="search"
                                        class="peer py-3 px-4 block w-full bg-gray-100 border-green-500 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search Recipe">
                                </div>

                                <a wire:navigate
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="/add/recipe">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    Add Recipe
                                </a>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800  px-5">
                                <tr>

                                    @include('livewire.theaders.th', [
                                        'name' => 'name',
                                        'columnName' => 'Recipe Name',
                                    ])

                                    @include('livewire.theaders.th', [
                                        'name' => 'description', //column name from db
                                        'columnName' => 'Description', //display name
                                    ])

                                    @include('livewire.theaders.th', [
                                        'name' => 'price', //column name from db
                                        'columnName' => 'Price', //display name
                                    ])

                                    @include('livewire.theaders.th', [
                                        'name' => 'category_id', //column name from db
                                        'columnName' => 'Category', //display name
                                    ])

                                    @include('livewire.theaders.th', [
                                        'name' => 'created_at', //column name from db
                                        'columnName' => 'Created', //display name
                                    ])
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @if (count($recipes) > 0)
                                    @foreach ($recipes as $recipe)
                                        <tr wire:key="{{ $recipe->id }}">
                                            <td class="size-px  px-5">
                                                <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                                    <a wire:navigate href="">
                                                        <div class="flex items-center gap-x-3">
                                                            <img class="inline-block size-[38px] rounded-full"
                                                                src="{{ Storage::url(str_replace('public/', '', $recipe->image)) }}"
                                                                alt="Recipe Image">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ str($recipe->name)->words(3) }}</span>
                                                        </div>
                                                </div>
                                                </a>

                    </div>
                    </td>
                    <td>
                        <div class="px-6 py-3">
                            <span
                                class="block text-sm  text-gray-800 dark:text-neutral-200">{{ str($recipe->description)->words(8) }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium">
                                ${{ $recipe->price }}
                            </span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span
                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                {{ $recipe->category->name }}
                            </span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span
                                class="text-sm text-gray-500 dark:text-neutral-500">{{ date('D M Y, H:i', strtotime($recipe->created_at)) }}</span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                            <a wire:navigate
                                class="inline-flex items-center gap-x-1 text-sm text-green-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-green-500"
                                href="edit/{{ $recipe->id }}/product">
                                Edit
                            </a>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                            <a wire:navigate wire:click="delete({{ $recipe->id }})"
                                wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-green-500"
                                href="">
                                Delete
                            </a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="size-px whitespace-nowrap" colspan="5">
                            <div class="px-6 py-3">
                                <span
                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                    No Data Found!
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                        <div class="flex gap-2">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="7">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <!-- the links to different pages -->
                        <div>
                            {{ $recipes->links() }}
                        </div>

                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
</div>

<!-- End Table Section -->
