<!-- Nav bar -->
<!-- hidden on small devices -->

<nav class="relative bg-violet-900">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex">
        <button @click="desktopMenuOpen = ! desktopMenuOpen"
            class="flex items-center justify-center w-40 h-full ml-5 cursor-pointer bg-amber-400">
            <div class="flex justify-around" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

                All categories
            </div>
        </button>

        <div class="flex gap-8 mx-7">
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="{{ url('/') }}">
                Home
            </a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="{{ url('catalog') }}">
                Catalog
            </a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="{{ url('about-us') }}">
                About Us
            </a>
            <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                href="{{ url('contact-us') }}">
                Contact Us
            </a>
        </div>
        <div class="flex gap-4 px-5 ml-auto">
            @auth('customer')
                <p class="text-white">{{ Auth::guard('customer')->user()->username }}</p>
                <span class="text-white">&#124;</span>
                <form action="{{ route('home.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="font-light text-white duration-100 hover:text-yellow-400 hover:underline">Logout</button>
                </form>
            @endauth
            @guest('customer')
                <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                    href="{{ url('login') }}">
                    Login
                </a>

                <span class="text-white">&#124;</span>

                <a class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
                    href="{{ url('sign-up') }}">Sign Up</a>
            @endguest
        </div>
    </div>
</nav>
<!-- /Nav bar -->
