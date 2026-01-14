<div class="topLinks" wire:ignore>
     <a href="{{route('admin.car.create')}}"
        class="{{ request()->routeIs('admin.car.create') ? 'active' : '' }}"> <i class="ri-arrow-right-long-line"></i>create Car</a>
    <a href="{{route('admin.car')}}" class="{{ request()->routeIs('admin.car') ? 'active' : '' }}"> <i class="ri-arrow-right-long-line"></i>All Cars</a>
</div>