<div id="mediaModal" class="fixed inset-0  bg-black/80 z-50 w-full
    hidden">
    <div class="bg-slate-100 relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80%] h-screen overflow-y-auto p-2">
        <livewire:media.upload />
        <livewire:media.edit-select-images modal="true" />
    </div>
</div>

<script>
    // Media Modal Js
    document.addEventListener('openMediaModal', function () {
        document.getElementById('mediaModal').classList.remove('hidden'); // Unhide the modal
    });
    document.addEventListener('closeMediaModal', function () {
        document.getElementById('mediaModal').classList.add('hidden'); // Unhide the modal
    });
</script>