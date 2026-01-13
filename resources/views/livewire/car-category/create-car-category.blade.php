<div>
    <x-layouts.tab>
        <x-slot name="topLinks">
            <x-tab-links.car-category-tab-links />
        </x-slot>
        <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">Create CarCategory</h2>
        <x-car-category.car-category-form formSubmitFunction="createCategory" create="true" />
    </x-layouts.tab>
</div>