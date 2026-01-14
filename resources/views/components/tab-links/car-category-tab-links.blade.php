<div class="topLinks" wire:ignore>
     <a href="{{route('admin.carcategory.create')}}"
        class="{{ request()->routeIs('admin.carcategory.create') ? 'active' : '' }}"> 
        <i class="ri-arrow-right-long-line"></i>create Car Category</a>
    <a href="{{route('admin.carcategory')}}" class="{{ request()->routeIs('admin.carcategory') ? 'active' : '' }}"> 
        <i class="ri-arrow-right-long-line"></i>All Car Category</a>
</div>