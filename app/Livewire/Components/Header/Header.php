<?php

namespace App\Livewire\Components\Header;

use App\Models\SiteSettings;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $settingData = SiteSettings::with(['headerLogoImage'])->first();
        return view('livewire.components.header.header', ['settingData' => $settingData]);
    }
}
