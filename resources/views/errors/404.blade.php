<x-layouts.app>
    <x-slot name="meta">
        <title>Page Not Found</title>
        <!-- canonical link -->
        <link rel="canonical" href="{{ url()->current() }}">
    </x-slot>
   
    <div class="w-full h-full flex flex-col gap-2 text-center justify-center items-center min-h-[500px]">
        <h1 class="text-[clamp(2rem,10vw,5rem)]">404</h1>
        <p class="capitalize">Not Found!</p>
        <a wire:navigate
            class="font-bold text-secondary-500 hover:text-secondary-600 transition-all underline capitalize"
            href="{{route('home')}}">Get Back To Home</a>
    </div>
</x-layouts.app>