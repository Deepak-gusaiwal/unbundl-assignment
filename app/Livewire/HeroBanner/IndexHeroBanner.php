<?php

namespace App\Livewire\HeroBanner;

use App\Models\HeroBanner;
use Livewire\Component;

class IndexHeroBanner extends Component
{
    public function render()
    {
        $HeroBannerData = HeroBanner::with(['thumnailImage'])->first();
        return view('livewire.hero-banner.index-hero-banner', ['heroBannerData' => $HeroBannerData]);
    }
}
