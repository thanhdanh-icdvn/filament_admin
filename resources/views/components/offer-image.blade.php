    <!-- Offer image  -->

    <div class="relative">
        <img class="w-full object-cover brightness-50 filter lg:h-[500px]"
            {{-- src="{{ url('storage/images/header-bg.jpeg') }}"  --}}
            src="{{ url('storage/'.$offerImage->image) }}"
            alt="Living room image" />

        <div
            class="absolute top-1/2 left-1/2 mx-auto flex w-11/12 max-w-[1200px] -translate-x-1/2 -translate-y-1/2 flex-col text-center text-white lg:ml-5">
            <h1 class="text-4xl font-bold sm:text-5xl lg:text-left">
                {{-- Best Collection for Home decoration --}}
                {{ $offerImage->name }}
            </h1>
            <p class="pt-3 text-xs lg:w-3/5 lg:pt-5 lg:text-left lg:text-base">
                {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur
                aperiam natus, nulla, obcaecati nesciunt, itaque adipisci earum
                ducimus pariatur eaque labore. --}}
                {{ $offerImage->description }}
            </p>
            <a href="{{url($offerImage->link)}}"
                class="w-1/2 px-3 py-1 mx-auto mt-5 text-black duration-100 bg-amber-400 hover:bg-yellow-300 lg:mx-0 lg:h-10 lg:w-2/12 lg:px-10">
                Order Now
            </a>
        </div>
    </div>

    <!-- /Offer image  -->
