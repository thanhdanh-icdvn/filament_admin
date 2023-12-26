<h2 class="mx-auto mb-5 max-w-[1200px] px-5">SHOP BY CATHEGORY</h2>
<!-- Cathegories -->
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
    {{-- <!-- 1 -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/bedroom.png') }}" alt="bedroom cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Bedroom
            </p>
        </div>
    </a>

    <!-- 2 -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/matrass.png') }}" alt="Matrass cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Matrass
            </p>
        </div>
    </a>

    <!-- 3  -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/outdoors.png') }}" alt="kitchen cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Outdoor
            </p>
        </div>
    </a>

    <!-- 4 -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/product-bigsofa.png') }}" alt="bedroom cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Sofa
            </p>
        </div>
    </a>

    <!-- 5  -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/kitchen.png') }}" alt="bedroom cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Kitchen
            </p>
        </div>
    </a>

    <!-- 6 -->

    <a href="#">
        <div class="relative cursor-pointer">
            <img class="w-auto h-auto mx-auto duration-300 brightness-50 hover:brightness-100"
                src="{{ url('storage/images/living-room.png') }}" alt="bedroom cathegory image" />

            <p
                class="absolute w-11/12 text-center text-white -translate-x-1/2 -translate-y-1/2 pointer-events-none top-1/2 left-1/2 lg:text-xl">
                Living room
            </p>
        </div>
    </a> --}}
</section>
<!-- /Cathegories  -->
