<div class="max-w-2xl mx-auto p-4">
    <!-- Review Submission -->
    @auth
        <div class="p-6 border rounded-lg mb-6 bg-white shadow-md">
            <h3 class="text-xl font-bold mb-4">Leave a Review</h3>
            @if (session()->has('message'))
                <div class="text-green-600 mt-2">{{ session('message') }}</div>
            @endif
            <form wire:submit.prevent="submitReview">
                <textarea wire:model="review" class="w-full border rounded-lg p-3 mb-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Write your review here"></textarea>
                @error('review') <span class="text-red-600">{{ $message }}</span> @enderror

                <div class="mt-4">
                    <label for="rating" class="block mb-2">Rating:</label>
                    <select wire:model="rating" id="rating" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('rating') <span class="text-red-600">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4 hover:bg-green-600 transition duration-300">Submit</button>
            </form>
        </div>
    @else
        <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-green-600 underline">log in</a> to leave a review.</p>
    @endauth

    <!-- Reviews List -->
    <div>
        <h3 class="text-xl font-bold mb-4">Reviews</h3>
        @forelse ($reviews->take($initialReviewCount) as $review)
            <div class="p-6 border rounded-lg mb-4 bg-white shadow-md">
                <div class="flex justify-between items-center">
                    <span class="font-semibold">{{ $review->user->name }}</span>
                    <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-700">{{ $review->review }}</p>
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
        @empty
            <p class="text-gray-600">No reviews yet.</p>
        @endforelse

        @if ($reviews->count() > $initialReviewCount)
            <button wire:click="loadMore" class="bg-green-500 text-white px-4 py-2 rounded mt-4 hover:bg-green-600 transition duration-300">View All Reviews</button>
        @endif
    </div>
</div>
