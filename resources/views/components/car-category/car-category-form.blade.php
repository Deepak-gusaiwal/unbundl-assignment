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
                    <x-form.button type="submit"
                        class="text-sm font-semibold my-2 flex justify-center items-center gap-2">
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