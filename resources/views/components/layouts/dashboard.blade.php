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
    @vite(['resources/css/dropzone.css'])
    @vite(['resources/css/app.css'])
</head>

<body>
    <livewire:components.header.header />
    <x-toaster-hub />
    <div class="mainWrapper max-w-[1550px] mx-auto grid md:grid-cols-6">
        <div class="md:col-span-1 dashboardLeftContainer h-full w-full overflow-x-auto">
            <div class="sideBar md:sticky md:top-[calc(var(--headerHeight)+5px)] py-1">
                @if (auth()->user()->is_admin)
                    <!-- media url -->
                    <a href="{{route('admin.dashboard')}}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" > <i class="ri-file-image-fill"></i>dashboard</a>
                    <a href="{{route('admin.media')}}" class="{{ request()->routeIs('admin.media') ? 'active' : '' }}" > <i class="ri-file-image-fill"></i>media</a>
                    <a href="{{route('admin.carcategory.create')}}" class="{{ 
                    request()->routeIs('admin.carcategory','admin.carcategory.create','admin.carcategory.edit') ? 
                    'active' : '' }}" > <i class="ri-file-image-fill"></i>Car Category</a>
                    <a href="{{route('admin.car.create')}}" class="{{ 
                    request()->routeIs('admin.car','admin.car.create','admin.car.edit') ? 
                    'active' : '' }}" > <i class="ri-file-image-fill"></i>Car</a>
                    <a href="{{route('admin.enquiry')}}" class="{{ 
                    request()->routeIs('admin.enquiry') ? 
                    'active' : '' }}" > <i class="ri-file-image-fill"></i>Enquiry</a>
                @endif
            </div>
        </div>
        <div class="md:col-span-5 dashboardRightContainer p-2">
            {{ $slot }}
        </div>
    </div>
    <livewire:components.footer.footer />
   <x-modal.media-modal />
    @livewireScripts
    @vite(['resources/js/app.js'])
    
</body>

</html>