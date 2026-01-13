<?php

namespace App\Livewire\CarCategory;

use App\Models\CarCategory;
use Livewire\Component;

class CarCategoryGrid extends Component
{
    public function render()
    {
        $carCategories = CarCategory::with('thumbnailImage')->get();
        return view('livewire.car-category.car-category-grid', ['categories' => $carCategories]);
    }
}
