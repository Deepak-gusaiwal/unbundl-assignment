<x-layouts.tab>
    <x-slot name="topLinks">
        <x-tab-links.car-tab-links />
    </x-slot>

    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">All Cars</h2>
    <form class="bg-secondary-600 p-2">
        <x-form.input name="search" id="search" placeholder="search" live="true" />
    </form>
<div class="tableContainer">
    <table class="dataTable">
        <tr class="bg-secondary-600 text-white capitalize">
            <th></th>
            <th>No</th>
            <th>thumbnail</th>
            <th>title</th>
            <th>slug</th>
            <th>operations</th>
        </tr>

        @foreach ($cars as $car)
            <tr>
                <td><label for="{{"car" . $car->id}}" class="flex justify-center items-center bg-gray-200">
                        <input type="checkbox" class="w-4 h-4" id="{{"car" . $car->id}}"
                            value="{{ $car->id }}" wire:model.live="selectedCars"></label>
                </td>
                <td>{{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}</td>
                <td>
                    @if ($car->thumbnailImage)
                        <a wire:navigate href="#" class="imgbox w-[50px] aspect-square mx-auto">
                            <img class="w-full h-full object-cover"
                                src="{{$car->thumbnailImage->getImageUrl()}}">
                        </a>
                    @else
                        <p>No Image Selected</p>
                    @endif
                </td>
                <td>{{$car->title}} </td>
                <td>{{$car->slug}} </td>

                <td>
                    <div>
                        <button wire:click="deleteCar({{ $car->id }})"
                            wire:confirm="Are you sure you want to delete this category?"
                            class="p-1 text-red-500 bg-slate-100 hover:bg-red-200 capitalize rounded-md">
                            <i class="ri-delete-bin-7-fill"></i>
                        </button>
                        <a href="{{ route('admin.car.edit', ['carSlug' => $car->slug]) }}"
                            class="p-1 text-yellow-500 bg-slate-100 hover:bg-yellow-200 capitalize  rounded-md">
                            <i class="ri-pencil-fill"></i>
                        </a>
                    
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
    </div>
    @if ($selectedCars) {{-- Correct check --}}
        <x-form.button wire:click="bulkDelete" wire:confirm="Are you sure you want to delete selected cars?"
            class="mt-2">
            Bulk Delete ({{ count($selectedCars) }})
        </x-form.button>
    @endif
    <div class="p-2">
        {{ $cars->links() }}
    </div>
</x-layouts.tab>