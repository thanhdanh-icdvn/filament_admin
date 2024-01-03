{{-- resources/views/pages/account/index.blade.php --}}
<x-layouts.content-layout>
    <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <x-sidebar />
        <!-- form  -->
        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
            <div class="py-5">
                {{-- Personal profile --}}
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="flex flex-col h-full p-8 bg-gray-100 rounded-lg">
                            <div class="flex items-center mb-3">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <h2 class="text-lg font-medium text-gray-900 title-font">The Catalyzer</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="text-base leading-relaxed">Blue bottle crucifix vinyl post-ironic four dollar
                                    toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                                <a class="inline-flex items-center mt-3 text-indigo-500">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                        viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /form  -->
    </section>
</x-layouts.content-layout>
