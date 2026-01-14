<header class="relative z-40">
    <div class="headerWrapper rounded-md max-w-[1300px] mx-auto h-[60px] flex gap-2 justify-between items-center py-1 px-2 relative isolate ">
        <a href="{{ route('home') }}" class="flex justify-center items-center h-full text-[clamp(1rem,2vw,4rem)] font-bold">
            @if ($settingData?->headerLogoImage?->getImageUrl())
             <img 
             class="w-full h-full object-contain"
             src="{{ $settingData?->headerLogoImage?->getImageUrl() }}" alt="{{ $settingData->site_name }}" title="{{ $settingData->site_name }}">
             @else
             {{ $settingData->site_name }}
            @endif
        </a>
        <div class="menu flex items-center md:gap-4 gap-2 uppercase md:ml-auto">
            <a  class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a  class="{{ request()->routeIs('cars') ? 'active' : '' }}" href="{{ route('cars') }}">cars</a>
           
            @guest
            <a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
            @endguest
             @auth
            <a  class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">dashboard</a>
            
            @endauth
        </div>
        @auth
        <livewire:auth.logout class="md:ml-0 ml-auto"/>
        @endauth
        <span class="navToggler md:hidden flex justify-center items-center w-[35px] aspect-square bg-primary-50 rounded-md text-primary-500 shadow-sm cursor-pointer z-20">
            <i class="ri-bar-chart-horizontal-fill"></i>
        </span>
    </div>
</header>
@script
<script>
    let menu = document.querySelector('header .headerWrapper .menu');
    let navToggler = document.querySelector(".navToggler");
    let body = document.querySelector('body')
    navToggler.addEventListener('click', () => {
        navToggler.classList.toggle('active');
        
        document.body.classList.toggle('no-scroll')
        menu.classList.toggle('active');
        if(navToggler.classList.contains('active')){
            navToggler.querySelector('i').classList.replace('ri-bar-chart-horizontal-fill', 'ri-close-circle-fill');
            navToggler.classList.add('text-2xl')
        }else{
    navToggler.querySelector('i').classList.replace( 'ri-close-circle-fill','ri-bar-chart-horizontal-fill');
            navToggler.classList.remove('text-2xl')
        }
    })

    // add sticky on scroll to header
    document.body.addEventListener('scroll', () => {
        const scrollY = body.scrollTop;
        if (scrollY > 80) {
            gsap.to("header", {
                position: 'sticky',
                top: 0,
                ease: "power2.out",
            });
            gsap.to("header .headerWrapper", {
                boxShadow: '0 10px 25px rgba(0,0,0,0.15)',
                ease: "power2.out",
                background:"white",
            });
        } else {
            gsap.to("header", {
                position: 'relative',
                ease: "power2.out",
            });
              gsap.to("header .headerWrapper", {
                boxShadow: '',
                ease: "power2.out",
                background:""
            });
        }

    });
</script>
@endscript