<header class="bg-primary-500 text-white">
    <div class="headerWrapper max-w-[1300px] mx-auto h-[60px] flex gap-2 justify-between items-center">
        <a href="{{ route('home') }}" class="text-[clamp(1rem,2vw,4rem)] font-bold">LOGO</a>
        <div class="menu flex items-center md:gap-4 gap-2 uppercase">
            <a href="{{ route('home') }}">Home</a>
            @auth
            <a href="{{ route('admin.dashboard') }}">dashboard</a>
            <livewire:auth.logout/>
            @endauth
            @guest
            <a href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </div>
</header>