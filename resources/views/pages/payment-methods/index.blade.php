<x-layouts.content-layout>
    <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <x-sidebar />
        <!-- form  -->
        <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
            <div class="py-5">
                <div class="w-full"></div>
                <form class="flex w-full flex-col gap-3" action="" autocomplete="false">
                    <div class="flex w-full flex-col">
                        <label class="flex" for="name">Payment Card Number</label>
                        <input x-mask="9999 9999 9999 9999" class="w-full border px-4 py-2 lg:w-1/2" type="text"
                            placeholder="1223 4568 7644 4839" />
                    </div>

                    <div class="flex w-full flex-col">
                        <label class="flex" for="name">Card Holder</label>
                        <input class="w-full border px-4 py-2 lg:w-1/2" type="text" placeholder="SARAH JOHNSON"
                            id="name" name="name" />
                    </div>

                    <div class="flex items-center gap-5 lg:w-1/2">
                        <div class="flex flex-col">
                            <label class="flex" for="card">Expiry Date</label>

                            <div class="flex w-[150px] items-center gap-1" id="card">
                                <input x-mask="99" class="w-1/2 border px-4 py-2 text-center" placeholder="10"
                                    id="cardDate" name="cardDate" />

                                <span>/</span>

                                <input x-mask="99" class="w-1/2 border px-4 py-2 text-center" placeholder="36"
                                    id="cardYear" name="cardYear" />
                            </div>
                        </div>

                        <div class="flex flex-col w-[60px] lg:w-[110px]">
                            <label class="flex" for="cvc">CVV/CVC</label>
                            <input x-mask="999" class="w-full border py-2 text-center lg:w-1/2" type="password"
                                placeholder="&bull;&bull;&bull;" id="cvc" name="cvc" />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white">
                            Save changes
                        </button>

                        <button class="mt-4 w-40 bg-amber-400 px-4 py-2">
                            Add new card
                        </button>
                    </div>
                </form>

                <!-- another payment-methods -->

                <h2 class="mt-10 text-left text-xl font-medium">
                    Another methods:
                </h2>
                <section class="my-4 grid w-fit grid-cols-3 gap-4 lg:grid-cols-4">
                    <img class="w-[100px] cursor-pointer" src="{{ url('storage/images/payment-method-bitcoin.svg') }}"
                        alt="bitcoin icon" />
                    <img class="w-[100px] cursor-pointer" src="{{ url('storage/images/payment-method-paypal.svg') }}"
                        alt="paypal icon" />
                    <img class="w-[100px] cursor-pointer" src="{{ url('storage/images/payment-method-stripe.svg') }}"
                        alt="stripe icon" />
                    <img class="w-[100px] cursor-pointer" src="{{ url('storage/images/payment-method-visa.svg') }}"
                        alt="visa icon" />
                    <img class="w-[100px] cursor-pointer"
                        src="{{ url('storage/images/payment-method-mastercard.svg') }}" alt="mastercard icon" />
                </section>
                <!-- another payment-methods -->
            </div>
        </section>
        <!-- /form  -->
    </section>
    </x-layouts.conte-layout>
