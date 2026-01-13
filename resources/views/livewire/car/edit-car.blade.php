<div>

    <x-layouts.tab>
        <x-slot name="topLinks">
            <x-tab-links.car-tab-links />
        </x-slot>
        <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">Edit Car</h2>
        <x-car.car-form :carCategories="$carCategories" :isFeatured="$isFeatured" formSubmitFunction="updateCar" />
    </x-layouts.tab>
</div>