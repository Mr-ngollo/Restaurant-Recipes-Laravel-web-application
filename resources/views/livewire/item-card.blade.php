<div class="bg-gray-100 shadow-sm rounded-lg hover:border border-green-400 p-1">
    <a wire:navigate href="/recipe/{{$recipe->id}}/details">
        <div>
            <img src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('/assets/images/2.jpg') }}" alt="recipe-images" class="rounded-t-lg object-cover w-full h-[180px]">
        </div>
        <div>
            <h2 class="line-clamp-1 px-3 font-medium">{{ $recipe->name }}</h2>
            <h2 class="line-clamp-2 px-3">{{ $recipe->description }}</h2>
            <div class="flex justify-between px-3 py-2">
                <div class="bg-green-200 p-1 rounded-md">
                    <h2 class="text-1xl">{{ $recipe->category->name }}</h2>
                </div>
                <h2 class="text-1xl font-medium">${{ $recipe->price }}</h2>
            </div>
            @if (auth()->check())
            <a wire:click.prevent="addToCart({{ $recipe->id }})" href="#">
                <div class="flex gap-2 justify-center w-full rounded bg-green-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-green-700 focus:outline-none focus:ring active:bg-green-500 sm:w-auto">
                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-green-500" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span>Add to cart</span>
                </div>
            </a>
            @else
                <a wire:navigate href='/auth/login'>
                    <div class="flex gap-2 justify-center w-full rounded bg-green-600 px-12 py-2 text-sm font-medium text-white text-center shadow hover:bg-green-700 focus:outline-none focus:ring active:bg-green-500 sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span>Add to cart</span>
                    </div>
                </a>
            @endif
        </div>
    </a>
</div>
