<x-layouts.tab>
    <h2 class="text-center text-primary-500 capitalize font-bold my-2 md:text-2xl text-xl">All Enquires</h2>

    <div class="tableContainer">
        <table class="dataTable">
            <tr class="bg-secondary-600 text-white capitalize">
                <th></th>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Car</th>
                <th>Operations</th>
            </tr>

            @foreach ($enquires as $enquiry)
                <tr>
                    <td></td>
                    <td>{{ ($enquires->currentPage() - 1) * $enquires->perPage() + $loop->iteration }}</td>

                    <td>{{$enquiry->name}} </td>
                    <td>{{$enquiry->email}} </td>
                    <td>{{$enquiry->phone_number}} </td>
                    <td>
                        @if ($enquiry->car && $enquiry->car->thumbnailImage->getImageUrl())
                            <img src="{{ $enquiry->car->thumbnailImage->getImageUrl() }}" alt="">
                        @else
                            <p>No Image Selected</p>
                        @endif
                    </td>
                    <td>
                        <div>
                            <button wire:click="deleteEnquiry({{ $enquiry->id }})"
                                wire:confirm="Are you sure you want to delete this category?"
                                class="p-1 text-red-500 bg-slate-100 hover:bg-red-200 capitalize rounded-md">
                                <i class="ri-delete-bin-7-fill"></i>
                            </button>

                            <a wire:navigate href="{{route('admin.enquiry.view', ['enquiryId' => $enquiry->id])}}"
                                class="p-1 text-blue-500 bg-slate-100 hover:bg-blue-200 capitalize  rounded-md">
                                <i class="ri-eye-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    <div class="p-2">
        {{ $enquires->links() }}
    </div>
</x-layouts.tab>