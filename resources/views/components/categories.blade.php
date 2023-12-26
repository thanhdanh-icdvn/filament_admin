<h2 class="mx-auto mb-5 max-w-[1200px] px-5">{{ __('SHOP BY CATEGORIES') }}</h2>
<!-- Categories -->
<section class="mx-auto grid max-w-[1200px] grid-cols-2 px-5 lg:grid-cols-3 lg:gap-5">
    @foreach ($productCategories as $productCategory)
        <a href="{{ 'product-categories/' . $productCategory->slug }}">
            <div class="relative cursor-pointer">
                <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                    src="{{ url('storage/' . $productCategory->thumbnail) }}" alt="{{ $productCategory->name }}" />

                <p
                    class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                    {{ $productCategory->name }}
                </p>
            </div>
        </a>
    @endforeach
</section>
<!-- /Categories  -->
