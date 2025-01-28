<div>
    <div x-data="{ showCookieBanner: true, acceptedCookies: false }">
        <!-- Cookie Banner -->
        <div x-show="showCookieBanner" x-transition class="fixed bottom-0 end-0 z-[60] w-full p-4 sm:max-w-sm mx-auto">
            <!-- Card -->
            <div class="p-4 bg-white/60 backdrop-blur-lg rounded-xl shadow-2xl dark:bg-neutral-900/60 dark:shadow-black/70">
                <div class="flex flex-col sm:flex-row justify-between gap-x-5">
                    <div class="grow mb-4 sm:mb-0">
                        <h2 class="font-semibold text-gray-800 dark:text-white">
                            Cookie Settings
                        </h2>
                    </div>
                    <!-- Dismiss Button -->
                    <button type="button" @click="showCookieBanner = false"
                        class="inline-flex rounded-full p-2 text-gray-500 hover:bg-white focus:outline-none focus:bg-white dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="mt-2 text-sm text-gray-800 dark:text-neutral-200">
                    We use cookies to improve your experience and for marketing. Visit our <a
                        class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('cookie.policy') }}">Cookies Policy</a> to learn more.
                </p>
                <div class="mt-5 mb-2 w-full flex flex-wrap gap-x-2 gap-y-2">
                    <div class="grid w-full sm:w-1/2">
                        <button type="button" @click="acceptedCookies = true; showCookieBanner = false"
                            class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Allow all
                        </button>
                    </div>
                    <div class="grid w-full sm:w-1/2">
                        <button type="button" @click="acceptedCookies = false; showCookieBanner = false"
                            class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Reject all
                        </button>
                    </div>
                </div>
                <div class="grid w-full mt-3">
                    <button type="button"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Manage cookies
                    </button>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- Cookie Banner End -->

        <!-- Optional Cookie Policy Page Link -->
        <svg class="-z-[1] absolute bottom-0 end-0" width="273" height="250" viewBox="0 0 273 250" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1727_230)">
                <!-- SVG paths -->
            </g>
            <defs>
                <clipPath id="clip0_1727_230">
                    <rect width="273" height="250" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>

    <script>
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.querySelectorAll('.hs-overlay').forEach((el) => HSOverlay.open(el));
            });
        });
    </script>

</div>
