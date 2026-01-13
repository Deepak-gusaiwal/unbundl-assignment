<?php

namespace App\Livewire\HeroBanner;

use App\Models\HeroBanner;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditHeroBanner extends Component
{
    public $top_heading, $bottom_heading, $description, $thumbnail;
    public $HeroBannerData = null;

    public function mount()
    {
        $this->populateData(); // to populate richText Value
    }
    public function populateData()
    {
        try {
            $HeroBannerData = HeroBanner::first();
            if (!$HeroBannerData) {
                return redirect()->route('notFound');
            }

            $this->HeroBannerData = $HeroBannerData;
            $this->top_heading = $HeroBannerData->top_heading;
            $this->bottom_heading = $HeroBannerData->bottom_heading;
            $this->description = $HeroBannerData->description;
            $this->thumbnail = $HeroBannerData->thumbnail;
            //to load image in form
            $this->dispatch('loadSelectedThbmbnailImage', $this->thumbnail);
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function updateHeroBanner(){
          $validatedData = $this->validate([
            'thumbnail' => 'nullable|exists:images,id',
            'top_heading' => 'nullable|string',
            'bottom_heading' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        try {
            $HeroBannerData = HeroBanner::first();
            if (!$HeroBannerData) {
                return redirect()->route('notFound');
            }
            $HeroBannerData->update([
                'top_heading' => $validatedData['top_heading'],
                'bottom_heading' => $validatedData['bottom_heading'],
                'description' => $validatedData['description'],
                'thumbnail' => $validatedData['thumbnail'],
            ]);
            $this->reset();
            Toaster::success("Hero Banner is Updated Successfully");
            return redirect(url()->previous());
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    // ======================= emit functions
    //set thumbnail image on event
    #[On('chooseThumbnailImageEmit')]
    public function setThumbnailValue($image)
    {
        $this->thumbnail = $image['id'];
    }

    // remove image on call of dispatch event by chooseSingleimage component
    #[On('selectedThumbnailImageRemoved')]
    public function removeThumbnailImageValue()
    {
        $this->reset('thumbnail');
    }
    public function render()
    {
        return view('livewire.hero-banner.edit-hero-banner')->layout('components.layouts.dashboard');
    }
}
