<div class="topLinks" wire:ignore>
    <a href="{{route('admin.dashboard')}}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>dashboard</a>
    <a href="{{route('admin.settings')}}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>settings</a>
    <a href="{{route('admin.herobanner')}}" class="{{ request()->routeIs('admin.herobanner') ? 'active' : '' }}"> <i
            class="ri-file-image-fill"></i>hero banner</a>
</div>