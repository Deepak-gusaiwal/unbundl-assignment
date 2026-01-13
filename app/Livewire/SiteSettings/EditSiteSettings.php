<?php

namespace App\Livewire\SiteSettings;

use App\Models\SiteSettings;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditSiteSettings extends Component
{
    public $site_name, $thumbnail;
    public $settingData = null;
    public function mount()
    {
        $this->populateData(); // to populate richText Value
    }
    public function populateData()
    {
        try {
            $settingData = SiteSettings::first();
            if (!$settingData) {
                return redirect()->route('notFound');
            }
            
            $this->settingData = $settingData;
            $this->site_name = $settingData->site_name;
            $this->thumbnail = $settingData->header_logo;
             //to load image in form
            $this->dispatch('loadSelectedThbmbnailImage', $this->thumbnail);
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function updateSettings()
    {
        $validatedData = $this->validate([
            'thumbnail' => 'nullable|exists:images,id',
            'site_name' => 'nullable|string',
        ]);

        try {
            $settingData = SiteSettings::first();
            if (!$settingData) {
                return redirect()->route('notFound');
            }
            $settingData->update([
                'site_name' => $validatedData['site_name'],
                'header_logo' => $validatedData['thumbnail'],
            ]);
            $this->reset();
            Toaster::success("Settings are Updated Successfully");
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
        return view('livewire.site-settings.edit-site-settings')->layout('components.layouts.dashboard');
    }
}
