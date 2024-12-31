<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- jsuites css --}}
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

    {{-- pikaday --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    {{-- apex tree --}}
    <script src="https://cdn.jsdelivr.net/npm/apextree"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    {{ $slot }}
    @livewireScripts
    @livewireCalendarScripts

    {{-- jsuites js --}}
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <script src="https://jsuites.net/v4/jsuites.webcomponents.js"></script>

    {{-- pikaday --}}
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    {{-- moment --}}
    <script src="{{ asset('js/moment.js') }}"></script>

    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
