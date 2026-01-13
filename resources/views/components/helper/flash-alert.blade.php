@if(session('error'))
    <div class="bg-red-50">
        <p class="text-red-700 p-2 px-4 capitalize font-semibold">
            {{session('error')}}
        </p>
    </div>
@endif
@if(session('success'))
    <div class="bg-green-50">
        <p class="text-green-700 p-2 px-4 capitalize font-semibold">
            {{session('success')}}
        </p>
    </div>
@endif