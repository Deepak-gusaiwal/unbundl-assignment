<x-form.button variant="destructive" class="flex gap-2 items-center justify-center" wire:click="logout">
    <span class="md:inline-block hidden">logout</span>
    <span><i class="ri-logout-circle-r-fill"></i></span>
    <x-helper.loading target="logout" />
</x-form.button>