<div>
    <div class="flex gap-5 p-20">
        <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('/assets/images/2.jpg') }}"
            alt="recipe-images" class="rounded-t-lg object-cover w-full h-[400px]">
        <div>
            <h2 class="p-1 font-medium text-2xl line-clamp-2">{{ $recipe->name }}</h2>
            <h2 class="p-1  text-gray-500 line-clamp-4">{{ $recipe->description }}</h2>
            <div class="flex gap-10">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-1xl ">{{ $recipe->category->name }}</h2>
                </div>
                <h2 class="text-2xl font-medium">${{ $recipe->price }}</h2>
            </div>
            <div class="my-3">
                @if (auth()->check())
                    <button wire:click="addToCart({{ $recipe->id }})">
                        <div
                            class="flex gap-2 justify-center w-full rounded bg-green-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-green-700 focus:outline-none focus:ring active:bg-green-500 sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span>Add to cart</span>
                        </div>
                    </button>
                @else
                    <a wire:navigate href='/auth/login'>
                        <div
                            class="flex gap-2 justify-center w-full rounded bg-green-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-green-700 focus:outline-none focus:ring active:bg-green-500 sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span>Add to cart</span>
                        </div>
                    </a>
                @endif

                <div class="max-w-4xl mx-auto p-6">
                    <!-- Recipe Details -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold mb-2">{{ $recipe->name }}</h2>
                        <p class="text-gray-700">{{ $recipe->description }}</p>

                        <!-- Recipe Category -->
                        <p class="mt-4 text-sm text-gray-500">Category: <span
                                class="font-semibold">{{ $recipe->category->name }}</span></p>
                    </div>

                    {{-- <!-- Reviews Section -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold mb-4">Reviews</h3>

                        @if ($reviews->isEmpty())
                            <p class="text-gray-600">No reviews yet. Be the first to leave a review!</p>
                        @else
                            <!-- Display Average Rating -->
                            <div class="flex items-center mb-4">
                                <p class="text-sm font-medium text-gray-600">
                                    Average Rating:
                                    <span class="text-yellow-500">
                                        @for ($i = 1; $i <= floor($averageRating); $i++)
                                            ★
                                        @endfor
                                        @for ($i = floor($averageRating) + 1; $i <= 5; $i++)
                                            ☆
                                        @endfor
                                    </span>
                                    ({{ number_format($averageRating, 2) }} / 5)
                                </p>
                            </div>

                            <!-- List of Reviews -->
                            @foreach ($reviews as $review)
                                <div class="p-4 border rounded-lg mb-4 bg-white shadow-md">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold">{{ $review->user->name }}</span>
                                        <span
                                            class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-gray-700">{{ $review->review }}</p>
                                        <div class="text-yellow-500 mt-2">
                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                ★
                                            @endfor
                                            @for ($i = $review->rating + 1; $i <= 5; $i++)
                                                ☆
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- preparation -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2
                class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800 dark:text-neutral-200 animate__animated animate__fadeIn">
                Recipe Preparation Stages
            </h2>
        </div>
        <!-- End Title -->

        <div class="max-w-5xl mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <!-- Stage 1: Recipe Development -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 1: Recipe Development
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Research new recipe ideas, test flavors, and adjust ingredients to align with market trends and
                        customer preferences.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Ensure that the recipe is cost-effective by calculating ingredient costs and potential profit
                        margins.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Stage 2: Recipe Documentation -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 2: Recipe Documentation
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Document the ingredients with accurate measurements and provide detailed cooking instructions
                        for consistency.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Include nutritional information and allergen warnings where applicable, ensuring compliance with
                        regulations.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Stage 3: Recipe Approval -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 3: Recipe Approval
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Submit the recipe for internal review by chefs and management, ensuring it meets taste, cost,
                        and operational standards.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Implement feedback and finalize the recipe, making adjustments as necessary to improve flavor or
                        presentation.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Stage 4: Menu Integration -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 4: Menu Integration
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Add the recipe to the menu with an enticing description and pricing that reflects ingredient
                        costs and desired profit.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Update the restaurant's POS and inventory systems to ensure smooth operation and consistency in
                        ingredient supply.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Stage 5: Recipe Scaling -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 5: Recipe Scaling
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Adjust the recipe to scale for different portion sizes or batch preparation for high-volume
                        periods.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Ensure that ingredients are stocked and ready for consistent production, and plan for efficient
                        kitchen workflow.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Stage 6: Continuous Monitoring & Feedback -->
                <div
                    class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 6: Continuous Monitoring & Feedback
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Gather customer feedback on the dish, paying attention to taste, portion size, and overall
                        satisfaction.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Use the feedback to make any necessary adjustments to the recipe, and continuously monitor
                        kitchen efficiency for improvements.
                    </p>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </div>

    <!-- Tailwind CSS Animation (Optional) -->
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate__fadeIn {
            animation: fadeIn 1s ease-out;
        }
    </style>

    @livewire('recipe-reviews', ['recipeId' => $recipe->id])


    <div class="my-5 px-20 pt-5">
        <h2 class="text-2xl font-medium">Related Recipes</h2>
        <livewire:recipe-listing :category_id="$recipe->category_id" :current_recipe_id="$recipe->id" />
    </div>
</div>
