    <!-- Cons bages -->
    <section class="container flex flex-col justify-center gap-3 mx-auto my-8 lg:flex-row">
        @foreach ($services as $service)
            <div class="flex flex-row items-center justify-center px-5 py-4 mx-5 border-2 border-yellow-400">
                {{-- <x-icon-delivery class="w-6 h-6 text-violet-900 lg:mr-2" /> --}}
                @svg($service->icon,'w-6 h-6 text-violet-900 lg:mr-2')
                <div class="flex flex-col justify-center ml-6">
                    <h3 class="text-xs font-bold text-left lg:text-sm">{{$service->name}}</h3>
                    <p class="text-xs text-center text-light lg:text-left lg:text-sm">
                        {{$service->description}}
                    </p>
                </div>
            </div>
        @endforeach
    </section>

    <!-- /Cons bages  -->
