<div>
    @if ($selectedThumbnailImage)
        <div class="imgBox max-w-[100px] my-2 overflow-hidden bg-gray-50 p-2 rounded-md">
            <img class="w-full h-full object-cover" src="{{ asset('storage/uploads/' . $selectedThumbnailImage['path']) }}"
                alt="{{$selectedThumbnailImage['alt']}}" title="{{$selectedThumbnailImage['title']}}">
        </div>
    @endif
    <!-- actions -->
    <div class="flex gap-2 items-center flex-wrap">

        <span wire:click="openModal" wire:loading.attr="disabled"
            class="flex gap-2 justify-center items-center font-semibold cursor-pointer text-sm w-fit py-1 px-2 bg-blue-100 hover:bg-blue-200  text-blue-500 capitalize text-center shadow-md rounded-md">
            <i class="ri-file-image-fill"></i>
            {{$selectedThumbnailImage ? "Change Image" : "Choose Image"}}
            <x-helper.loading target="openModal" />
        </span>
        @if($selectedThumbnailImage)
            <span wire:click="removeThumbnailImage" wire:loading.attr="disabled"
                class="flex gap-2 justify-center cursor-pointer font-semibold items-center w-fit py-1 px-2 text-sm bg-red-100 hover:bg-red-200 text-red-500 capitalize text-center shadow-md rounded-md">
                <i class="ri-delete-bin-7-fill"></i>
                remove <x-helper.loading target="removeThumbnailImage" />
            </span>
        @endif

    </div>
</div>