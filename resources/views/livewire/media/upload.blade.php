
<div class="max-w-[1200px] mx-auto">
    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">Upload Media</h2>
    <livewire:dropzone name="files" wire:model="files" :rules="['image', 'mimes:png,jpeg,jpg,gif,webp', 'max:3072']" :multiple="true" />
    @error('files')
        <p class="text-red-500 italic mt-1 text-sm ">{{$message}}</p>
    @enderror
    <x-form.button wire:click="submit" type="submit" class="mt-2 flex justify-center items-center gap-2">
        <i class="ri-upload-2-line"></i>
        Upload <x-helper.loading target="files" />
    </x-form.button>
</div>