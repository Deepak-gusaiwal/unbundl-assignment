<div class="topLinks" wire:ignore>
     <a href="{{route('admin.carcategory.create')}}"
        class="{{ request()->routeIs('admin.carcategory.create') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>create Car Category</a>
    <a href="{{route('admin.carcategory')}}" class="{{ request()->routeIs('admin.carcategory') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>All Car Category</a>
</div>