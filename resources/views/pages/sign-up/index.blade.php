<x-layouts.content-layout>
    <!-- Register card  -->
    <section class="mx-auto mt-10 w-full flex-grow mb-10 max-w-[1200px] px-5">
        <div class="container px-5 py-5 mx-auto border shadow-sm md:w-1/2">
            <div class="">
                <p class="text-4xl font-bold">CREATE AN ACCOUNT</p>
                <p>Register for new customer</p>
            </div>

            <form class="flex flex-col mt-6" method="POST" action="{{ route('sign-up.store') }}" id="registerForm">
                {{ csrf_field() }}
                <label for="first_name">First Name</label>
                <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name" name="first_name"
                    id="first-name" />
                @error('first_name')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
                <label for="last_name">Last Name</label>
                <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="Last name" name="last_name"
                    id="last_name" />
                @error('last_name')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
                <label for="username">Username</label>
                <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="Username" name="username"
                    id="username" />
                @error('username')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror

                <label class="mt-3" for="email">Email Address</label>
                <input class="px-4 py-2 mt-3 border" type="email" placeholder="mail@example.com" name="email"
                    id="email" />
                @error('email')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
                <label class="mt-5" for="password">Password</label>
                <input class="px-4 py-2 mt-3 border" type="password"
                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="password" id="password"
                    type="password" />
                @error('password')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
                <label class="mt-5" for="password_confirmation">Confirm password</label>
                <input class="px-4 py-2 mt-3 border" type="password"
                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="password_confirmation"
                    id="password_confirmation" type="password" />
                @error('password_confirmation')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
            </form>

            <div class="flex justify-between mt-4">
                <form class="flex gap-2">
                    <input type="checkbox" />
                    <label for="checkbox">
                        I have read and agree with
                        <a href="#" class="text-violet-900">terms &amp; conditions</a>
                    </label>
                </form>
            </div>

            <button class="w-full py-2 my-5 text-white bg-violet-900" type="submit" form="registerForm">
                CREATE ACCOUNT
            </button>

            <p class="text-center text-gray-500">OR SIGN UP WITH</p>

            <div class="flex gap-2 my-5">
                <button class="w-1/2 py-2 text-white bg-blue-800">FACEBOOK</button>
                <button class="w-1/2 py-2 text-white bg-orange-500">GOOGLE</button>
            </div>

            <p class="text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-violet-900">Login now</a>
            </p>
        </div>
    </section>
    <!-- /Register Card  -->
</x-layouts.content-layout>
