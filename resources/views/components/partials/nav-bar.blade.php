<!-- Nav bar -->
<!-- hidden on small devices -->

<nav class="relative bg-violet-900">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex">
        <button @click="desktopMenuOpen = ! desktopMenuOpen"
            class="ml-5 flex h-full w-40 cursor-pointer items-center justify-center bg-amber-400">
            <div class="flex justify-around" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mx-1 h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

                All categories
            </div>
        </button>

        <div class="mx-7 flex gap-8">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="index.html">Home</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="catalog.html">Catalog</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="about-us.html">About Us</a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="contact-us.html">Contact Us</a>
        </div>

        <div class="ml-auto flex gap-4 px-5">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="login.html">Login</a>

            <span class="text-white">&#124;</span>

            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline" href="sign-up.html">Sign
                Up</a>
        </div>
    </div>
</nav>
<!-- /Nav bar -->
