<x-layouts.tab>
    <x-slot name="topLinks">
        <x-tab-links.dashboard-tab-links />
    </x-slot>
    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">Site Settings</h2>
    <form wire:submit="updateSettings" class="max-w-[500px] my-2 mx-auto p-2 bg-primary-50 shadow-sm">
        <x-form.input label="site name" type="text" placeholder="site name" name="site_name" id="site_name" />
        <livewire:media.choose-single-image />
        <x-form.button type="submit" class="text-sm font-semibold my-2 flex justify-center items-center gap-2">
                update
            <x-helper.loading target="updateSettings" />
        </x-form.button>
    </form>
</x-layouts.tab>