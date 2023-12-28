<x-layouts.content-layout>
    <!-- Login card  -->
    <section class="mx-auto flex-grow w-full mt-10 mb-10 max-w-[1200px] px-5">
        <div class="container px-5 py-5 mx-auto border shadow-sm md:w-1/2">
            <div class="">
                <p class="text-4xl font-bold">LOGIN</p>
                <p>Welcome back, customer!</p>
            </div>

            <form class="flex flex-col mt-6" id="loginForm" method="POST" action="{{ route('login.login') }}">
                {{ csrf_field() }}
                <label for="login">Username or email</label>
                <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="username or email"
                    name="login" />
                @error('login')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror

                <label for="password">Password</label>
                <input class="px-4 py-2 mt-3 border" type="password"
                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="password" />
                @error('password')
                    <span class="text-sm text-red-700">{{ $message }}</span>
                @enderror
            </form>

            <div class="flex justify-between mt-4">
                <form class="flex gap-2">
                    <input type="checkbox" />
                    <label for="checkbox">Remember me</label>
                </form>
                <a href="#" class="text-violet-900">Forgot password</a>
            </div>

            <button class="w-full py-2 my-5 text-white bg-violet-900" type="submit" form="loginForm">
                LOGIN
            </button>

            <p class="text-center text-gray-500">OR LOGIN WITH</p>

            <div class="flex gap-2 my-5">
                <button class="w-1/2 py-2 text-white bg-blue-800">FACEBOOK</button>
                <button class="w-1/2 py-2 text-white bg-orange-500">GOOGLE</button>
            </div>

            <p class="text-center">
                Don`t have account?
                <a href="{{ url('/sign-up') }}" class="text-violet-900">Register now</a>
            </p>
        </div>
    </section>
    <!-- /Login Card  -->
</x-layouts.content-layout>
