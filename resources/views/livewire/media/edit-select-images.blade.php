<div class="bg-gray-100 p-2 rounded-md my-2">
    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">Edit/Select Images</h2>
    <div class="actions flex gap-2 items-center mb-4">
        <!-- show loading on select -->
        <div class="w-10 flex items-center justify-center">
            <x-helper.loading target="OnSelectImage()" width="5" class="" />
        </div>
        @if($selectedImage)
            <x-form.button wire:click="delete" wire:confirm="Are you sure you want to delete this image?"
                variant="destructive">Delete
                <i class="ri-delete-bin-7-fill"></i>
                <x-helper.loading target="delete" />
            </x-form.button>
        @endif
        @if ($modal)
          <x-form.button wire:click="closeModal"
                variant="destructive">cancel
               <i class="ri-close-fill"></i>
                <x-helper.loading target="closeModal" />
            </x-form.button>
        @endif
        @if ($modal && $selectedImage)
          <x-form.button wire:click="selectThumbnailImageEmit" >select Image
               <i class="ri-close-fill"></i>
                <x-helper.loading target="selectThumbnailImageEmit" />
            </x-form.button>
        @endif
    </div>
    <div class="md:col-span-4 grid md:grid-cols-6 grid-cols-3 gap-2 bg-slate-100">
        @foreach ($images as $image)

            <label for="{{ $image->id }}" class="imgBox p-2 rounded-md relative aspect-square isolate cursor-pointer
                        {{$selectedImage && $selectedImage->id === $image->id ? 'border-4 bg-secondary-500' : 'bg-slate-200' }}
                        " wire:click="OnSelectImage({{ $image->id }})">

                <img class="w-full h-full object-cover" src="{{ $image->getImageUrl("small") }}" alt="{{$image->alt}}"
                    title="{{$image->title}}">
            </label>
        @endforeach

        <div class="col-span-full p-2">
            {{ $images->links() }}
        </div>
    </div>
</div>