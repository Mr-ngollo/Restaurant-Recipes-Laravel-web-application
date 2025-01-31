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
    class="sticky top-0 inset-x-0 z-20 bg-gradient-to-r from-blue-500 to-purple-600 border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
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
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-200" width="16"
                    height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    bg-gradient-to-r from-blue-500 to-purple-600 border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800 dark:border-neutral-700"
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4 flex items-center">
            <!-- Logo -->
            <a
            wire:navigate
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
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                        text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                        {{Request::is('admin/dashboard') ? 'bg-blue-700' : ''}}"
                            href="/admin/dashboard">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('manage/categories') ? 'bg-blue-700' : ''}}"
                            href="/manage/categories">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                <line x1="16" x2="16" y1="2" y2="6" />
                                <line x1="8" x2="8" y1="2" y2="6" />
                                <line x1="3" x2="21" y1="10" y2="10" />
                                <path d="M8 14h.01" />
                                <path d="M12 14h.01" />
                                <path d="M16 14h.01" />
                                <path d="M8 18h.01" />
                                <path d="M12 18h.01" />
                                <path d="M16 18h.01" />
                            </svg>
                            Categories
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('recipes') ? 'bg-blue-700' : ''}}"
                            href="/recipes">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                            Recipes
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('orders') ? 'bg-blue-700' : ''}}"
                            href="/orders">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6" width="24"
                                height="24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                            </svg>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('users') ? 'bg-blue-700' : ''}}"
                            href="/users">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                              </svg>
                            Users
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('enquiries') ? 'bg-blue-700' : ''}}"
                            href="/enquiries">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                              </svg>
                            Enquiries
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300
                            {{Request::is('reviews') ? 'bg-blue-700' : ''}}"
                            href="/reviews">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                              </svg>
                            Reviews
                        </a>
                    </li>
                    <li>
                        <a
                        wire:navigate
                        class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm
                            text-white rounded-lg hover:bg-blue-700 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300"
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
