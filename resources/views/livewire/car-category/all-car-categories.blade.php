<x-layouts.tab>
    <x-slot name="topLinks">
        <x-tab-links.car-category-tab-links />
    </x-slot>

    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">All CarCategory</h2>
    <form class="bg-secondary-600 p-2">
        <x-form.input name="search" id="search" placeholder="search" live="true" />
    </form>

    <table class="dataTable">
        <tr class="bg-secondary-600 text-white capitalize">
            <th></th>
            <th>No</th>
            <th>thumbnail</th>
            <th>title</th>
            <th>slug</th>
            <th>operations</th>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td><label for="{{"category" . $category->id}}" class="flex justify-center items-center bg-gray-200">
                        <input type="checkbox" class="w-4 h-4" id="{{"category" . $category->id}}"
                            value="{{ $category->id }}" wire:model.live="selectedCategories"></label>
                </td>
                <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                <td>
                    @if ($category->thumbnailImage)
                        <a wire:navigate href="#" class="imgbox w-[50px] aspect-square mx-auto">
                            <img class="w-full h-full object-cover"
                                src="{{$category->thumbnailImage->getImageUrl("icon_large")}}">
                        </a>
                    @else
                        <p>No Image Selected</p>
                    @endif
                </td>
                <td>{{$category->title}} </td>
                <td>{{$category->slug}} </td>

                <td>
                    <div>
                        <button wire:click="deleteCategory({{ $category->id }})"
                            wire:confirm="Are you sure you want to delete this category?"
                            class="p-1 text-red-500 bg-slate-100 hover:bg-red-200 capitalize rounded-md">
                            <i class="ri-delete-bin-7-fill"></i>
                        </button>
                        <a href="{{ route('admin.carcategory.edit', ['categorySlug' => $category->slug]) }}"
                            class="p-1 text-yellow-500 bg-slate-100 hover:bg-yellow-200 capitalize  rounded-md">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <a wire:navigate href="#"
                            class="p-1 text-blue-500 bg-slate-100 hover:bg-blue-200 capitalize  rounded-md">
                            <i class="ri-eye-fill"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
    @if ($selectedCategories) {{-- Correct check --}}
        <x-form.button wire:click="bulkDelete" wire:confirm="Are you sure you want to delete selected categories?"
            class="mt-2">
            Bulk Delete ({{ count($selectedCategories) }})
        </x-form.button>
    @endif
    <div class="p-2">
        {{ $categories->links() }}
    </div>
</x-layouts.tab>