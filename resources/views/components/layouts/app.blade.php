<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($meta) && $meta)
        {{ $meta }}
    @endif
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.8.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>

<body>
    <livewire:components.header.header />
    <x-toaster-hub />
    <div class="mainWrapper">
        {{ $slot }}
    </div>
    <livewire:components.footer.footer />
    <livewire:enquiry.enquiry-modal />
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
    @vite(['resources/js/app.js'])
</body>

</html>