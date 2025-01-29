<div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Recipe Image -->
        <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('/assets/images/placeholder.jpg') }}"
            alt="{{ $recipe->name }}" class="rounded-lg object-cover w-full h-[400px]">

        <!-- Recipe Details -->
        <div>
            <h2 class="text-3xl font-semibold">{{ $recipe->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $recipe->description }}</p>

            <!-- Category & Price -->
            <div class="flex items-center gap-4 mt-3">
                <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full">{{ $recipe->category->name }}</span>
                <span class="text-xl font-medium text-gray-800">${{ $recipe->price }}</span>
            </div>

            <!-- Nutritional Info -->
            <div class="mt-4">
                <p class="text-sm text-gray-700">Dietary Information: <span class="font-semibold">{{ $recipe->dietary_info }}</span></p>
                <p class="text-sm text-gray-700">Cuisine Type: <span class="font-semibold">{{ $recipe->cuisine_type }}</span></p>
                <p class="text-sm text-gray-700">Cooking Time: <span class="font-semibold">{{ $recipe->cooking_time }} minutes</span></p>
            </div>

            <!-- Add to Cart Button -->
            @if (auth()->check())
                <button wire:click="addToCart({{ $recipe->id }})" class="mt-5 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">Add to Cart</button>
            @else
                <a href="/auth/login" class="mt-5 inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">Login to Purchase</a>
            @endif
        </div>
    </div>

    <!-- Ingredients & Preparation -->
    <div class="mt-10 p-6 bg-white rounded-xl shadow-xl border border-gray-200">
        <h3 class="text-3xl font-bold text-green-800 border-b-4 border-green-500 pb-2 inline-block">
            🍽️ Ingredients
        </h3>
        <ul class="list-disc list-inside mt-4 space-y-2 text-gray-700 text-lg">
            @foreach (json_decode($recipe->ingredients) as $ingredient)
                <li class="pl-2 transition-all hover:text-green-600 hover:font-medium">
                    {{ trim($ingredient) }}
                </li>
            @endforeach
        </ul>

        <h3 class="text-3xl font-bold text-green-800 border-b-4 border-green-500 pb-2 mt-8 inline-block">
            👨‍🍳 Preparation Steps
        </h3>
        <ol class="list-decimal list-inside mt-4 space-y-3 text-gray-700 text-lg">
            @foreach (json_decode($recipe->preparation_steps) as $step)
                @if (trim($step) != '')
                    <li class="pl-2 transition-all hover:text-green-600 hover:font-medium">
                        {{ trim($step) }}
                    </li>
                @endif
            @endforeach
        </ol>
    </div>


    <!-- Reviews Component -->
    @livewire('recipe-reviews', ['recipeId' => $recipe->id])

    <!-- Related Recipes -->
    <div class="mt-10">
        <h2 class="text-2xl font-medium">Related Recipes</h2>
        <livewire:recipe-listing :category_id="$recipe->category_id" :current_recipe_id="$recipe->id" />
    </div>
</div>
