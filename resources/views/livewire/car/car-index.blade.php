<div class="max-w-[1300px] mx-auto px-2 py-10">

       <h2 class="main-heading mx-auto text-secondary-600 uppercase text-[clamp(1.5rem,2vw,2rem)] text-center">
          All Available Cars
        </h2>

    <div class="grid md:grid-cols-4 gap-4">
        @foreach ($cars as $car)
        <div class="card">
                    <a href="#" class="flex flex-col gap-2 text-center">
                        <div class="imgBox">
                            <img src="{{ $car?->thumbnailImage?->getImageUrl() }}" alt="">
                        </div>
                        <h3>{{$car->title}}</h3>
                    </a>
                    <button class="cButton" wire:click="enquiryNow({{ $car->id }})">Enquiry Now
                        <i class="ri-arrow-right-up-long-fill"></i>
                        <x-helper.loading target="enquiryNow({{ $car->id }})" />
                    </button>
                </div>
        @endforeach
    </div>
 <div class="p-2">
        {{ $cars->links() }}
    </div>
</div>