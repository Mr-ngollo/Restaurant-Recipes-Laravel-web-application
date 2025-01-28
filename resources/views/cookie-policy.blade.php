<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restaurant-Recipes-App.</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    @endif
</head>

<body>
    <livewire:header />
    <div class="container mx-auto p-6 max-w-4xl">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-6">Cookie Policy</h1>

        <div class="text-gray-800 dark:text-neutral-200 space-y-6">
            <p class="mb-4 text-lg">
                This Cookie Policy explains how we use cookies and similar technologies to enhance your experience on
                our website. By using this website, you agree to the use of cookies as outlined in this policy.
            </p>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">What are Cookies?</h2>
            <p class="text-lg">
                Cookies are small text files that are stored on your device when you visit websites. They are commonly
                used to make websites work more efficiently, as well as to provide a more personalized experience.
            </p>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">How We Use Cookies</h2>
            <p class="text-lg">
                We use cookies to remember your preferences, enhance website functionality, and analyze how you use our
                site to improve our services.
            </p>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Managing Cookies</h2>
            <p class="text-lg">
                You can manage your cookie preferences at any time by adjusting the cookie banner on our website.
                Additionally, you can modify your browser settings to block cookies, though doing so may affect your
                browsing experience on this site.
            </p>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Types of Cookies We Use</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li class="text-lg">Essential Cookies: These are necessary for the basic functionality of the website.
                </li>
                <li class="text-lg">Performance Cookies: These cookies help us understand how visitors interact with our
                    website.</li>
                <li class="text-lg">Functional Cookies: These cookies remember your preferences and improve your
                    experience.</li>
                <li class="text-lg">Targeting Cookies: These cookies are used to deliver personalized ads or content.
                </li>
            </ul>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Your Consent</h2>
            <p class="text-lg">
                By continuing to use our website, you consent to the use of cookies as described in this policy. You can
                withdraw your consent at any time by managing your cookie preferences in the cookie banner.
            </p>

            <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Contact Us</h2>
            <p class="text-lg">
                If you have any questions about our cookie policy or how we use cookies, please feel free to contact us
                at <a href="mailto:contact@RestRecipes.com"
                    class="text-blue-600 dark:text-blue-500 hover:underline">contact@RestRecipes.com</a>.
            </p>

            <a href="javascript:history.back()"
                class="inline-block text-white bg-green-500 dark:bg-green-600 rounded-lg py-2 px-6 text-lg font-medium text-center hover:bg-green-600 dark:hover:bg-green-700 transition-colors mt-6">
                Go Back
            </a>

        </div>
    </div>

    <livewire:footer />
</body>

</html>
