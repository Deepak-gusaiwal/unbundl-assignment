<div class="max-w-4xl mx-auto overflow-x-auto">
    <table class="twoColTable">
        <tbody>
            <tr>
                <th>
                    Name
                </th>
                <td>
                    {{ $enquiry->name }}
                </td>
            </tr>

            <tr>
                <th >
                    Email
                </th>
                <td >
                    {{ $enquiry->email }}
                </td>
            </tr>

            <tr>
                <th >
                    Phone
                </th>
                <td >
                    {{ $enquiry->phone_number }}
                </td>
            </tr>

            <tr>
                <th >
                    Address
                </th>
                <td >
                    {{ $enquiry->address }}
                </td>
            </tr>

            <tr>
                <th >
                    Message
                </th>
                <td >
                    {{ $enquiry->message }}
                </td>
            </tr>

            <tr>
                <th >
                    Car
                </th>
                <td >
                    {{ $enquiry->car?->title ?? '—' }}
                </td>
            </tr>

            <tr>
                <th >
                    Car Image
                </th>
                <td >
                    @if ($enquiry->car && $enquiry->car->thumbnailImage?->getImageUrl())
                        <img
                            src="{{ $enquiry->car->thumbnailImage->getImageUrl() }}"
                            class="w-32 h-20 object-cover rounded border"
                            alt="Car Image"
                        >
                    @else
                        <span class="text-gray-400 text-sm">No Image</span>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
</div>
