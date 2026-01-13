<?php

namespace App\Livewire\Media;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class EditSelectImages extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $selectedImage = null, $modal = false;
    // on select single image
    public function OnSelectImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            $this->selectedImage = $image;
        }
    }
    //on choose thumnail image
    public function selectThumbnailImageEmit()
    {
        if ($this->selectedImage) {
            $this->dispatch('chooseThumbnailImageEmit', $this->selectedImage);
            $this->closeModal();
        }
    }
    //to delete single selected image
    public function delete()
    {
        try {
            if ($this->selectedImage) {
                $path = 'uploads/' . $this->selectedImage->path;
                // Delete file from storage
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $this->selectedImage->delete(); //delete form db
                Toaster::success('Image deleted successfully');
                $this->reset('selectedImage');
                $this->dispatch('fetchImages');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    // close image modal
    public function closeModal()
    {
        $this->dispatch('closeMediaModal');
        $this->reset('selectedImage');
    }
    #[On('fetchImages')]
    public function render()
    {
        return view('livewire.media.edit-select-images', [
            'images' => Image::latest()->paginate(12),
        ]);
    }
}
