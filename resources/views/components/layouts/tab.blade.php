<div>
    @if (isset($topLinks) && $topLinks)
        {{ $topLinks }}
    @endif
    {{ $slot }}
</div>