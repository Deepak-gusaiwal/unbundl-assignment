<div class="max-w-[1300px] mx-auto p-2">
    <h2 class="text-[clamp(1.5rem,3vw,3rem)] text-center capitalize font-semibold my-2 text-primary-500">
        {{$isFeatured ? "Featured" : "Popular"}} Cars
    </h2>

    <div class="grid md:grid-cols-4 gap-4">
        @foreach ($cars as $car)
           <div>
             <a href="#" class="flex flex-col gap-2 text-center">
                <div class="imgBox">
                    <img src="{{ $car?->thumbnailImage?->getImageUrl() }}" alt="">
                </div>
                <h3>{{$car->title}}</h3>
            </a>
            <button wire:click="enquiryNow({{ $car->id }})">Enquiry Now
                <x-helper.loading target="enquiryNow({{ $car->id }})" />
            </button>
           </div>
        @endforeach
    </div>

</div>