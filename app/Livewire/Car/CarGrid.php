<?php

namespace App\Livewire\Car;

use App\Models\Car;
use Livewire\Component;

class CarGrid extends Component
{
    public bool $isFeatured = false;

    public function enquiryNow($carId)
    {
        $this->dispatch('openEnquiryModal', $carId);
    }
    public function render()
    {
        $cars = Car::with('thumbnailImage')
            ->when($this->isFeatured, function ($query) {
                $query->where('is_featured', true);
            })
            ->get();
        return view('livewire.car.car-grid', ['cars' => $cars]);
    }
}
