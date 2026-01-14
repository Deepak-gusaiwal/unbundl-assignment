<div class="max-w-[1500px] mx-auto mt-2">
    <div class="bannerWrapper max-w-[1300px] mx-auto md:p-4 p-2 gap-2 rounded-md grid md:grid-cols-2">
        <div class="heroLeft flex items-center  md:text-start text-center">
            <div class="content">
                <h2 class="text-[clamp(2rem,4vw,4rem)] capitalize font-semibold mb-2">
                {!! $heroBannerData->top_heading !!}
                </h2>
            <h3 class="text-[clamp(1.5rem,4vw,2rem)] capitalize font-semibold mb-2">{!! $heroBannerData->bottom_heading !!}</h3>
            <p class="mb-2">{{ $heroBannerData->description }}</p>
            <a href="{{ route('cars') }}" class="cButton">View Cars <i class="ri-car-fill"></i></a>
            </div>
        </div>
        <div class="heroRight flex md:justify-end">
          <img src="{{ $heroBannerData?->thumnailImage?->getImageUrl() }}">
        </div>
    </div>
</div>