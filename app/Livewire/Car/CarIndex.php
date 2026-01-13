<?php

namespace App\Livewire\Car;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class CarIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $cars = Car::with('thumbnailImage')
            ->latest()
            ->paginate(10);
        return view('livewire.car.car-index', ['cars' => $cars]);
    }
}
