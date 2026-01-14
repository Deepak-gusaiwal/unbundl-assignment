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
    <div class="mainWrapper max-w-[1550px] mx-auto md:grid md:grid-cols-6">
        <div class="md:col-span-1 dashboardLeftContainer md:py-0 py-2 w-full overflow-x-auto bg-gray-50">
            <div class="sideBar">
                @if (auth()->user()->is_admin)
                    <!-- media url -->
                    <a href="{{route('admin.dashboard')}}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" > <i class="ri-arrow-right-long-line"></i>dashboard</a>
                    <a href="{{route('admin.media')}}" class="{{ request()->routeIs('admin.media') ? 'active' : '' }}" > <i class="ri-arrow-right-long-line"></i>media</a>
                    <a href="{{route('admin.carcategory.create')}}" class="{{ 
                    request()->routeIs('admin.carcategory','admin.carcategory.create','admin.carcategory.edit') ? 
                    'active' : '' }}" > <i class="ri-arrow-right-long-line"></i>Car Category</a>
                    <a href="{{route('admin.car.create')}}" class="{{ 
                    request()->routeIs('admin.car','admin.car.create','admin.car.edit') ? 
                    'active' : '' }}" > <i class="ri-arrow-right-long-line"></i>Car</a>
                    <a href="{{route('admin.enquiry')}}" class="{{ 
                    request()->routeIs('admin.enquiry') ? 
                    'active' : '' }}" > <i class="ri-arrow-right-long-line"></i>Enquiry</a>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
    @vite(['resources/js/app.js'])
    
</body>

</html>