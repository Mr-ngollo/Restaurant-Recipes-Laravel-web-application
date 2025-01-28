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


                <div class="flex items-center mt-3 mb-2">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                    <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
                </div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 global ratings</p>
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5
                        star</a>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 70%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">70%</span>
                </div>
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4
                        star</a>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 17%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">17%</span>
                </div>
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3
                        star</a>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 8%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8%</span>
                </div>
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2
                        star</a>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 4%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">4%</span>
                </div>
                <div class="flex items-center mt-4">
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1
                        star</a>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded-sm dark:bg-gray-700">
                        <div class="h-5 bg-yellow-300 rounded-sm" style="width: 1%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">1%</span>
                </div>

            </div>
        </div>
    </div>
    <!-- preparation -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800 dark:text-neutral-200 animate__animated animate__fadeIn">
                Recipe Preparation Stages
            </h2>
        </div>
        <!-- End Title -->
    
        <div class="max-w-5xl mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <!-- Stage 1: Recipe Development -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 1: Recipe Development
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Research new recipe ideas, test flavors, and adjust ingredients to align with market trends and customer preferences.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Ensure that the recipe is cost-effective by calculating ingredient costs and potential profit margins.
                    </p>
                </div>
                <!-- End Col -->
    
                <!-- Stage 2: Recipe Documentation -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 2: Recipe Documentation
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Document the ingredients with accurate measurements and provide detailed cooking instructions for consistency.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Include nutritional information and allergen warnings where applicable, ensuring compliance with regulations.
                    </p>
                </div>
                <!-- End Col -->
    
                <!-- Stage 3: Recipe Approval -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 3: Recipe Approval
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Submit the recipe for internal review by chefs and management, ensuring it meets taste, cost, and operational standards.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Implement feedback and finalize the recipe, making adjustments as necessary to improve flavor or presentation.
                    </p>
                </div>
                <!-- End Col -->
    
                <!-- Stage 4: Menu Integration -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 4: Menu Integration
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Add the recipe to the menu with an enticing description and pricing that reflects ingredient costs and desired profit.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Update the restaurant's POS and inventory systems to ensure smooth operation and consistency in ingredient supply.
                    </p>
                </div>
                <!-- End Col -->
    
                <!-- Stage 5: Recipe Scaling -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 5: Recipe Scaling
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Adjust the recipe to scale for different portion sizes or batch preparation for high-volume periods.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Ensure that ingredients are stocked and ready for consistent production, and plan for efficient kitchen workflow.
                    </p>
                </div>
                <!-- End Col -->
    
                <!-- Stage 6: Continuous Monitoring & Feedback -->
                <div class="transition-transform duration-700 ease-in-out transform hover:scale-105 hover:bg-gray-50 dark:hover:bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-2xl">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Stage 6: Continuous Monitoring & Feedback
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Gather customer feedback on the dish, paying attention to taste, portion size, and overall satisfaction.
                    </p>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Use the feedback to make any necessary adjustments to the recipe, and continuously monitor kitchen efficiency for improvements.
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
    

    <form class="w-full max-w-2xl mx-auto mt-5">
        <div class="mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="4"
                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="Write a comment..." required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600 border-gray-200">
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Post comment
                </button>
                <div class="flex space-x-1 sm:space-x-2">
                    <button type="button"
                        class="inline-flex justify-center items-center p-2 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 12 20">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                        </svg>
                        <span class="sr-only">Attach file</span>
                    </button>
                    <button type="button"
                        class="inline-flex justify-center items-center p-2 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 16 20">
                            <path
                                d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                        <span class="sr-only">Set location</span>
                    </button>
                    <button type="button"
                        class="inline-flex justify-center items-center p-2 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                        </svg>
                        <span class="sr-only">Upload image</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <p class="text-xs text-center text-gray-500 dark:text-gray-400">Remember, contributions to this topic should follow
        our
        <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Community Guidelines</a>.
    </p>
    <div class="my-5 px-20 pt-5">
        <h2 class="text-2xl font-medium">Related Recipes</h2>
        <livewire:recipe-listing :category_id="$recipe->category_id" :current_recipe_id="$recipe->id" />
    </div>
</div>
