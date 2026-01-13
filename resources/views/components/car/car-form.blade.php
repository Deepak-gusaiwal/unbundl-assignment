<form wire:submit.prevent="{{$formSubmitFunction}}" class="max-w-[1200px] my-2 mx-auto">
    <div class="grid md:grid-cols-4 gap-4">
        <div class="md:col-span-3">
            <x-form.input label="title" type="text" placeholder="title" name="title" id="title" :live="true" />
            <x-form.input label="slug" type="text" placeholder="slug" name="slug" id="slug" />
        </div>
        <div class="md:col-span-1 ">
            <div class="sticky top-[60px]">
                <livewire:media.choose-single-image />
                <p class="text-xs text-zinc-600 mt-2">Note :- Recommanded Image Size <span
                        class="font-bold text-black">1:1</span></p>
                @error('thumbnail')
                    <p class="text-red-500 italic mt-1 text-sm">{{$message}}</p>
                @enderror

                <!-- car categories -->
                <div>
                    <h2 class="text-center text-primary-500 font-bold capitalize mt-2 bg-primary-50 py-2">Select
                        Category</h2>
                    @foreach ($carCategories as $category)
                        <label for="{{'car-category-' . $category->id}}"
                            class="flex items-center gap-2 mb-1 bg-primary-50 border-b border-slate-400 select-none cursor-pointer hover:bg-primary-100">
                            <div class="imgBox cursor-pointer w-15 h-15 flex p-[2px] border-r border-slate-400">
                                @if($category->thumbnailImage)
                                    <img class="w-full h-full object-contain" src="{{$category->thumbnailImage->getImageUrl()}}"
                                        alt="{{$category->thumbnailImage->alt}}" title="{{$category->thumbnailImage->title}}">
                                @endif
                            </div>


                            <input categorySelect="true" type="checkbox" placeholder="category" wire:model="categories"
                                id="{{'car-category-' . $category->id}}" value="{{$category->id}}"
                                inputBox="flex flex-row-reverse justify-end items-center select-none bg-slate-200 p-1 gap-2" />
                            <span class="capitalize text-primary-800 font-semibold text-sm">{{ $category->title }}</span>
                        </label>


                    @endforeach
                    @error('categories')
                        <p class="text-red-500 italic mt-1 text-sm">{{$message}}</p>
                    @enderror
                </div>
                <!-- submit button -->
                <x-form.button type="submit">
                    @if (isset($create) && $create)
                        create
                    @else
                        update
                    @endif
                    <x-helper.loading target="{{$formSubmitFunction}}" />
                </x-form.button>
            </div>
        </div>
    </div>
</form>