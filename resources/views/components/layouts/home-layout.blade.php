<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased" x-data="{ desktopMenuOpen: false, mobileMenuOpen: false }">
    @component('components.partials.header')
    @endcomponent
    @component('components.partials.burger-menu')
    @endcomponent
    @component('components.partials.nav-bar')
    @endcomponent
    @component('components.partials.menu')
    @endcomponent
    {{ $slot }}
    @component('components.partials.footer')
    @endcomponent
    @component('components.partials.payment-copy-right')
    @endcomponent
</body>

</html>
