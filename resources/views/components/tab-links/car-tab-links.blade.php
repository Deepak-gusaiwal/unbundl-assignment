<div class="topLinks" wire:ignore>
     <a href="{{route('admin.car.create')}}"
        class="{{ request()->routeIs('admin.car.create') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>create Car</a>
    <a href="{{route('admin.car')}}" class="{{ request()->routeIs('admin.car') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>All Cars</a>
</div>