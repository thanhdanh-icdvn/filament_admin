<x-layouts.content-layout>
    <section class="container mx-auto w-full flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <x-sidebar />

        <!-- option cards  -->
        <div class="mb-5 flex items-center justify-between px-5 md:hidden">
            <div class="flex gap-3">
                <div class="py-5">
                    <div class="flex items-center">
                        <img width="40px" height="40px" class="rounded-full object-cover"
                            src="{{ url('storage/images/avatar-photo.png') }}" alt="Red woman portrait" />
                        <div class="ml-5">
                            <p class="font-medium text-gray-500">Hello,</p>
                            <p class="font-bold">Sarah Johnson</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button class="border bg-amber-400 py-2 px-2">
                    Profile settings
                </button>
            </div>
        </div>

        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid-cols-3">
            <div class="">
                <div class="border py-5 shadow-md">
                    <div class="flex justify-between px-4 pb-5">
                        <p class="font-bold">Personal Profile</p>
                        <a class="text-sm text-violet-900" href="{{ url('profile-information') }}">Edit</a>
                    </div>

                    <div class="px-4">
                        <p>Sarah Johnson</p>
                        <p>sarah@yandex.com</p>
                        <p>20371</p>
                        <p class="">1223 3432 3344 0082</p>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="border py-5 shadow-md">
                    <div class="flex justify-between px-4 pb-5">
                        <p class="font-bold">Shipping Address</p>
                        <a class="text-sm text-violet-900" href="{{ url('manage-address') }}">Edit</a>
                    </div>

                    <div class="px-4">
                        <p>Sarah Johnson</p>
                        <p>Belgrade, Serbia</p>
                        <p>20371</p>
                        <p>1223 3432 3344 0082</p>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="border py-5 shadow-md">
                    <div class="flex justify-between px-4 pb-5">
                        <p class="font-bold">Billing Address</p>
                        <a class="text-sm text-violet-900" href="#">Edit</a>
                    </div>

                    <div class="px-4">
                        <p>Sarah Johnson</p>
                        <p>Belgrade, Serbia</p>
                        <p>20371</p>
                        <p>1223 3432 3344 0082</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /option cards -->
    </section>
</x-layouts.content-layout>
