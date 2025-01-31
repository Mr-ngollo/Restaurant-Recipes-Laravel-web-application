<div class="max-w-2xl mx-auto p-6">
    <!-- Review Submission -->
    @auth
        <div class="p-6 border border-gray-200 rounded-xl bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-green-700 mb-4">💬 Leave a Review</h3>

            @if (session()->has('message'))
                <div class="text-green-600 font-semibold mb-3">{{ session('message') }}</div>
            @endif

            <form wire:submit.prevent="submitReview">
                <textarea wire:model="review"
                    class="w-full border rounded-lg p-3 mb-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Write your review here..."></textarea>
                @error('review')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror

                <div class="mt-3">
                    <label for="rating" class="block text-lg font-semibold text-gray-700 mb-2">⭐ Rating:</label>
                    <select wire:model="rating" id="rating"
                        class="border rounded-lg p-2 w-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                    @error('rating')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 mt-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading
                        class="animate-spin hidden inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-green-500"
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Submit Your Review
                </button>
            </form>
        </div>
    @else
        <p class="text-gray-600 text-center text-lg mt-4">
            Please <a href="{{ route('login') }}" class="text-green-600 underline font-semibold">log in</a> to leave a
            review.
        </p>
    @endauth

    <!-- Reviews List -->
    <div class="mt-8">
        <h3 class="text-2xl font-bold text-green-700 mb-4">📝 Reviews</h3>

        @forelse ($reviews->take($initialReviewCount) as $review)
            <div class="p-6 border border-gray-200 rounded-xl bg-white shadow-md mb-4">
                <div class="flex gap-2">
                    <div class="rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <span class="font-semibold text-lg text-gray-900">{{ $review->user->name }}</span>
                </div>
                    <div class="flex justify-end items-center mt-1">
                        <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                
                <p class="text-gray-700 mt-2 text-lg">{{ $review->review }}</p>

                <div class="text-yellow-500 text-xl mt-2">
                    @for ($i = 1; $i <= $review->rating; $i++)
                        ★
                    @endfor
                    @for ($i = $review->rating + 1; $i <= 5; $i++)
                        ☆
                    @endfor
                </div>
            </div>
        @empty
            <p class="text-gray-600 text-lg text-center">No reviews yet. Be the first to leave one! 😊</p>
        @endforelse

        @if ($reviews->count() > $initialReviewCount)
            <button wire:click="loadMore"
                class="bg-green-500 text-white font-semibold px-5 py-2 rounded-lg mt-4 hover:bg-green-600 transition duration-300 w-full">
                View All Reviews
            </button>
        @endif
    </div>
</div>
