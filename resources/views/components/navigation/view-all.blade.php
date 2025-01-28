<div class="flex justify-between items-center">
    <!-- Category Title -->
    <h2 class="font-medium text-[18px] sm:text-[20px] lg:text-[24px] my-3">
        {{ $Category }}
    </h2>

    <!-- View All Link -->
    <a
        wire:navigate
        class="inline-flex items-center gap-x-1 text-sm sm:text-base md:text-lg lg:text-xl text-green-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-green-500"
        href="/all/recipes"
    >
        View all
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </a>
</div>
