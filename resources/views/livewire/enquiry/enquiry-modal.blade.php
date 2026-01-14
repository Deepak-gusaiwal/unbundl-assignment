<div  id="enquiryModal" class="{{$isOpenModal ? "flex" :"hidden"}} justify-center  bg-black/80 fixed inset-0 p-2 z-50">
    <div class="bg-white max-w-[600px] w-full mx-auto p-4 rounded-md shadow-md relative isolate overflow-y-auto">
        <span wire:click="closeModal" id="closeEnquiryModal"
            class=" flex justify-center items-center text-xl w-8 aspect-square bg-red-500 text-white cursor-pointer absolute right-0 top-0">
            <i class="ri-close-fill"></i>
             <x-helper.loading class="absolute top-1/2 left-1/2 -translate-1/2" target="closeModal" />
        </span>
        <h1 class="text-center capitalize font-bold text-3xl text-primary-500">Enquiry Form</h1>
        <div class="my-2 flex flex-wrap justify-center items-center gap-2">
            @if ($car && $car->thumbnailImage)
              <div class="imgBox w-[200px] bg-primary-50 rounded-md" >
                  <img class="w-full h-full object-contain" src="{{ $car->thumbnailImage->getImageUrl() }}">
              </div>
              <h2 class="text-center capitalize font-semibold text-xl text-primary-500">{{ $car->title }}</h2>
            @endif
        </div>
        <form wire:submit="submit">
            <x-form.input label="name" placeholder="name" name="name" id="name" />
            <x-form.input label="email" placeholder="email" name="email" id="email" />
            <x-form.input label="phone number" placeholder="phone number" name="phone_number" id="phone_number" />
            <x-form.textarea label="address" placeholder="address" name="address" id="address" />
            <x-form.textarea label="message" placeholder="message" name="message" id="message" />
            <x-form.button type="submit">
                submit
                <x-helper.loading target="submit" />
            </x-form.button>
        </form>
    </div>
</div>
