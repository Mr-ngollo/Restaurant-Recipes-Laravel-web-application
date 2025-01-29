<div class="px-4 sm:px-6 md:px-10 lg:px-20 py-3 space-y-12">

    <!-- Latest Recipes Section -->
    <div>
        @include('components.navigation.view-all', [
            'Category' => 'Latest Recipes.',
        ])
        <livewire:recipe-listing :category_id="1" :current_recipe_id="0" />
    </div>

    <!-- Flour Recipes Section -->
    <div>
        @include('components.navigation.view-all', [
            'Category' => 'Flour Recipes.',
        ])
        <livewire:recipe-listing :category_id="4" :current_recipe_id="0" />
    </div>

    <!-- Soups Section -->
    <div>
        @include('components.navigation.view-all', [
            'Category' => 'Soups.',
        ])
        <livewire:recipe-listing :category_id="5" :current_recipe_id="0" />
    </div>

    <!-- Icon Blocks -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 items-center gap-6 md:gap-10">
        <!-- Card 1 -->
        <div class="w-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8M12 8v8" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md  font-semibold text-gray-800 dark:text-white truncate max-w-full">Quick & Easy Recipes</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Whip up delicious meals in no time with recipes designed for busy schedules.</p>
        </div>
        <!-- End Card 1 -->

        <!-- Card 2 -->
        <div class="w-full bg-white shadow-lg sm:p-2 rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="3" />
                        <path d="M6 22a6 6 0 0 1 12 0" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md  font-semibold text-gray-800 dark:text-white truncate max-w-full">Family Favorites</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Bring everyone together with recipes that cater to all ages and tastes.</p>
        </div>
        <!-- End Card 2 -->

        <!-- Card 3 -->
        <div class="w-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21V9a4 4 0 0 0-8 0v12" />
                        <path d="M16 3.8A2.2 2.2 0 0 0 13.8 1.6 2.2 2.2 0 0 0 11.6 4" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md font-semibold text-gray-800 dark:text-white truncate max-w-full">Authentic Flavors</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Explore traditional recipes from cuisines around the world.</p>
        </div>
        <!-- End Card 3 -->

        <!-- Card 4 -->
        <div class="w-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md  font-semibold text-gray-800 dark:text-white truncate max-w-full">Healthy & Nutritious</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Savor meals that are both tasty and packed with wholesome ingredients.</p>
        </div>
        <!-- End Card 4 -->

        <!-- Card 5 -->
        <div class="w-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2l3 6h6l-4 4 1 6-5-3-5 3 1-6-4-4h6z" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md font-semibold text-gray-800 dark:text-white truncate max-w-full">Chef’s Specials</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Discover signature dishes crafted with expert precision.</p>
        </div>
        <!-- End Card 5 -->

        <!-- Card 6 -->
        <div class="w-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex items-center sm:flex-col flex-wrap gap-x-4 mb-3">
                <div class="inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-green-50 bg-green-100 dark:border-green-900 dark:bg-green-800">
                    <svg class="shrink-0 w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 2H5v6h4zM15 2h4v6h-4zM3 10h18v12H3z" />
                    </svg>
                </div>
                <div class="shrink-0">
                    <h3 class="text-lg sm:text-md font-semibold text-gray-800 dark:text-white truncate max-w-full">Sweet Treats</h3>
                </div>
            </div>
            <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed">Indulge in desserts and baked goods that melt in your mouth.</p>
        </div>
        <!-- End Card 6 -->
    </div>
</div>
<!-- End Icon Blocks -->



</div>
