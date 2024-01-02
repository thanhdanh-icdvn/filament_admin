{{-- resources/views/pages/account/index.blade.php --}}
<x-layouts.content-layout>
    <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <x-sidebar />
        <!-- form  -->
        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
            <div class="py-5">
                <form class="flex flex-col" action="" autocomplete="false">
                    <div class="flex flex-row flex-wrap -mx-2">
                        <div class="flex flex-col w-full px-2 mb-4 md:w-1/2">
                            <label for="first_name">First Name</label>
                            <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name"
                                name="first_name" id="first-name" />
                        </div>
                        <div class="flex flex-col w-full px-2 mb-4 md:w-1/2">
                            <label for="first_name">First Name</label>
                            <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name"
                                name="first_name" id="first-name" />
                        </div>
                        <div class="flex flex-col w-full px-2 mb-4 md:w-1/2">
                            <label for="first_name">First Name</label>
                            <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name"
                                name="first_name" id="first-name" />
                        </div>
                        <div class="flex flex-col w-full px-2 mb-4 md:w-1/2">
                            <label for="first_name">First Name</label>
                            <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name"
                                name="first_name" id="first-name" />
                        </div>
                        <div class="flex flex-col w-full px-2 mb-4 md:w-1/2">
                            <label for="first_name">First Name</label>
                            <input class="px-4 py-2 mt-3 mb-3 border" type="text" placeholder="First name"
                                name="first_name" id="first-name" />
                        </div>
                    </div>
                    <div class="w-full">
                        <button class="w-40 px-4 py-2 mt-4 text-white bg-violet-900">
                            Save changes
                        </button>
                    </div>
                </form>
                <!-- another payment-methods -->
            </div>
        </section>
        <!-- /form  -->
    </section>
</x-layouts.content-layout>
