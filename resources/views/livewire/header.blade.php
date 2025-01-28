<header class="bg-white shadow-sm" x-data="{ open: false }">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center gap-4">
                <a class="flex gap-4 text-gray-600" href="/">
                    <img src="{{ asset('assets/images/githublogo.png') }}" class="w-10 h-10" alt="GitHub Logo" />
                    <!-- Hide title on small devices -->
                    <span class="hidden sm:block font-extrabold mt-2">RestRecipes.</span>
                </a>
            </div>

            <!-- Navigation Links for Medium and Large Devices -->
            <div class="hidden md:flex md:items-center md:gap-6">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-6 text-sm">
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/">Home</a></li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/all/recipes">Explore More</a></li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/about/us">About</a></li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/contacts">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Action Buttons and Toggle for Small Devices -->
            <div class="flex items-center gap-4">
                @if (auth()->check())
                    <!-- Inbox Icon -->
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                        </svg>
                    </a>

                    <!-- Logout Icon -->
                    <a class="text-gray-900 flex transition hover:text-gray-900/75" href="{{ route('logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </a>
                @else
                    <a class="hidden md:block rounded-md bg-green-700 hover:bg-green-800 px-5 py-2.5 text-sm font-medium text-white shadow"
                        href="{{ route('login') }}">
                        Get started
                    </a>
                @endif

                <!-- Toggle Button -->
                <button @click="open = !open" class="block md:hidden rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="open" class="mt-2 space-y-2 md:hidden mb-4">
            <!-- Logo Title for Mobile (Now in Navigation) -->
            <div class="flex items-center gap-4">
                <a class="flex gap-4 text-gray-600" href="/">
                    <span class="font-extrabold mt-2">RestRecipes.</span>
                </a>
            </div>

            <nav aria-label="Global">
                <ul class="flex flex-col gap-4 text-sm">
                    <li><a class="text-gray-500 transition hover:text-gray-500/75" href="/">Home</a></li>
                    <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#">Explore More</a></li>
                    <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#">About</a></li>
                    <li><a class="text-gray-500 transition hover:text-gray-500/75" href="#">Contact</a></li>
                    <!-- Add the same icons for logout and inbox on mobile -->
                    @if (auth()->check())
                        <li>
                            <a href="#" class="flex items-center gap-2 text-gray-500 hover:text-gray-500/75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                </svg>
                                Inbox
                            </a>
                        </li>
                        <li>
                            <a class="text-gray-500 flex items-center gap-2 transition hover:text-gray-500/75" href="{{ route('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
