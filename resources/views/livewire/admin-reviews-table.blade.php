<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Table Wrapper -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <!-- Search and Filter Section -->
                <div class="flex items-center justify-between p-4">
                    <div class="flex">
                        <!-- Search Input -->
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" wire:model="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                placeholder="Search reviews..." />
                        </div>
                    </div>

                    <!-- Role Filter -->
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Role:</label>
                            <select wire:model="filterRole"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">All</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 cursor-pointer" wire:click="sortBy('user.name')">
                                    User Name
                                    @if($sortField === 'user.name')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </th>
                                <th scope="col" class="px-4 py-3 cursor-pointer" wire:click="sortBy('user.email')">
                                    Email
                                    @if($sortField === 'user.email')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </th>
                                <th scope="col" class="px-4 py-3">Review</th>
                                <th scope="col" class="px-4 py-3 cursor-pointer" wire:click="sortBy('rating')">
                                    Rating
                                    @if($sortField === 'rating')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </th>
                                <th scope="col" class="px-4 py-3 cursor-pointer" wire:click="sortBy('created_at')">
                                    Created
                                    @if($sortField === 'created_at')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $review->user->name }}
                                    </td>
                                    <td class="px-4 py-3">{{ $review->user->email }}</td>
                                    <td class="px-4 py-3">{{ $review->review }}</td>
                                    <td class="px-4 py-3 text-yellow-500">
                                        {{ str_repeat('★', $review->rating) }}
                                    </td>
                                    <td class="px-4 py-3">{{ $review->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button wire:click="deleteReview({{ $review->id }})"
                                            class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center text-gray-600">
                                        No reviews found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination and Per Page -->
                <div class="py-4 px-3">
                    <div class="flex justify-between items-center">
                        <!-- Per Page Selector -->
                        <div class="flex items-center space-x-4">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page:</label>
                            <select wire:model="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <!-- Pagination Links -->
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
