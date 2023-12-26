<x-layouts.home-layout>
    @if ($offerImage)
        <x-offer-image :offerImage="$offerImage" />
    @endif
    <x-cons-bages />
    {{-- @widget('services') --}}
    <x-categories :productCategories="$productCategories" />
    <x-slider />
    <x-special-offer-card />
    <x-recomendation />
</x-layouts.home-layout>
