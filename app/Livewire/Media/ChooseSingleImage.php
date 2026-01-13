<?php

namespace App\Livewire\Media;

use App\Models\Image;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ChooseSingleImage extends Component
{
    public $selectedThumbnailImage = null;
    public function openModal()
    {
        $this->dispatch('openMediaModal');
    }
    #[On('chooseThumbnailImageEmit')]
    public function setThumbnailImage($image)
    {
        $this->selectedThumbnailImage = $image;
    }

    // ================ to remove image
    public function removeThumbnailImage()
    {
        $this->selectedThumbnailImage = null;
        $this->dispatch("selectedThumbnailImageRemoved");
    }
    //reset on save
    #[On('resetChooseSingleImage')]
    public function resetChooseSingleImage()
    {
        $this->reset();
    }
    // ================ to load images in edit form
    #[On('loadSelectedThbmbnailImage')]
    public function loadSelectedThbmbnailImage($imageId)
    {
        try {
            $image = Image::find($imageId);
            $image ? $this->selectedThumbnailImage = $image : "";
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.media.choose-single-image');
    }
}
