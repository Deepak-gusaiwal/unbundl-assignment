<x-layouts.tab>
    <x-slot name="topLinks">
        <x-tab-links.dashboard-tab-links />
    </x-slot>
    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">update hero banner</h2>
    <form wire:submit="updateHeroBanner" class="max-w-[500px] my-2 mx-auto p-2 bg-primary-50 shadow-sm">
        <x-form.input label="top heading" type="text" placeholder="top heading" name="top_heading" id="top_heading" />
        <x-form.input label="bottom heading" type="text" placeholder="bottom heading" name="bottom_heading" id="bottom_heading" />
        <x-form.textarea label="description" placeholder="description" name="description" id="description" />
        <livewire:media.choose-single-image />
        <x-form.button type="submit" class="text-sm font-semibold my-2 flex justify-center items-center gap-2">
            update
            <x-helper.loading target="updateHeroBanner" />
        </x-form.button>
    </form>
</x-layouts.tab>