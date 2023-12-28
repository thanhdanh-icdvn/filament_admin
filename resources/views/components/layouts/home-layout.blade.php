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
    <x-partials.header />
    <x-partials.burger-menu />
    <x-partials.nav-bar />
    <x-partials.menu />
    {{ $slot }}
    <x-partials.footer />
    <x-partials.payment-copy-right />
</body>

</html>
