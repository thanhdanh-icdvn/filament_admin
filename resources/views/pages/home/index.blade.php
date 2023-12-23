<x-layouts.home-layout>
    @if ($offerImage)
        <x-offer-image :offerImage="$offerImage" />
    @endif
    <x-cons-bages />
    <x-categories />
    <x-slider />
    <x-special-offer-card />
    <x-recomendation />
</x-layouts.home-layout>
