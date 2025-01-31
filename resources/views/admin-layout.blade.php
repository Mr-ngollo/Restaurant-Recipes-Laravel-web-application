<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireScripts
    @endif
</head>

<!-- ========== MAIN CONTENT ========== -->
<!-- Breadcrumb -->
<div
    class="sticky top-0 inset-x-0 z-20 bg-gradient-to-r from-green-500 to-yellow-600 border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
    <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        <button type="button"
            class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-white hover:text-gray-300 rounded-lg focus:outline-none focus:text-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
            aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
            </svg>
        </button>
        <!-- End Navigation Toggle -->

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap text-white">
            <li class="flex items-center text-sm">
                Application Layout
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-200" width="16" height="16"
                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </li>
            <li class="text-sm font-semibold truncate" aria-current="page">
                Dashboard
            </li>
        </ol>
        <!-- End Breadcrumb -->
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Sidebar -->
<div id="hs-application-sidebar"
    class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px] h-full
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-gradient-to-r from-green-500 to-yellow-600 border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800 dark:border-neutral-700"
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4 flex items-center">
            <!-- Logo -->
            <a wire:navigate
                class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="/admin/dashboard" aria-label="RestRecipes.">
                <a class="flex gap-4 text-white" href="/admin/dashboard">
                    <img src="{{ asset('assets/images/githublogo.png') }}" class="w-10 h-10" alt="GitHub Logo" />
                    <span class="font-extrabold mt-2">RestRecipes.</span>
                </a>
            </a>
            <!-- End Logo -->

            <div class="hidden lg:block ms-2">

            </div>
        </div>

        <!-- Content -->
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1 cursor-pointer">
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                        text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                        {{ Request::is('admin/dashboard') ? 'bg-green-700' : '' }}"
                            href="/admin/dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                              </svg>
                              
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{ Request::is('manage/categories') ? 'bg-green-700' : '' }}"
                            href="/manage/categories">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>

                            Categories
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{ Request::is('recipes') ? 'bg-green-700' : '' }}"
                            href="/recipes">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>

                            Recipes
                        </a>
                    </li>
                    {{-- <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('orders') ? 'bg-green-700' : ''}}"
                            href="/orders">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6" width="24"
                                height="24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                            </svg>
                            Orders
                        </a>
                    </li> --}}
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{ Request::is('users') ? 'bg-green-700' : '' }}"
                            href="/users">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            Users
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{ Request::is('enquiries') ? 'bg-green-700' : '' }}"
                            href="/enquiries">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                            </svg>

                            Enquiries
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{ Request::is('reviews') ? 'bg-green-700' : '' }}"
                            href="/reviews">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                              </svg>
                              
                            Reviews
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-green-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300"
                            href="/auth/login">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            Logout
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- End Content -->
    </div>
</div>
<!-- End Sidebar -->

<!-- Content -->
<div class="w-full bg-gray-200 min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
    <!-- your content goes here ... -->
    {{ $slot }}
</div>
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->
