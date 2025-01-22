<header class="bg-white shadow-sm">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="md:flex md:items-center md:gap-12">
          <a class="flex gap-4 text-gray-600" href="/">
            <img src="{{ asset('assets/images/githublogo.png') }}"
            class="w-10 h-10"
            alt="GitHub Logo"/>
            <span class="font-extrabold mt-2">RestRecipes.</span>
          </a>
        </div>

        <div class="hidden md:block">
          <nav aria-label="Global">
            <ul class="flex items-center gap-6 text-sm">
              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="/"> Home </a>
              </li>

              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Explore More </a>
              </li>

              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> About </a>
              </li>

              <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Contact </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="flex items-center gap-4">
          <div class="sm:flex sm:gap-4">
            <a
              class="rounded-md bg-green-700 hover:bg-green-800 px-5 py-2.5 text-sm font-medium text-white shadow"
              href="#"
            >
              Get started
            </a>
            </div>
          </div>

          <div class="block md:hidden">
            <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
