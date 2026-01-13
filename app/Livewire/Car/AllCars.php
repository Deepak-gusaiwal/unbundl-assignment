<?php

namespace App\Livewire\Car;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AllCars extends Component
{
    use WithPagination;
    public $search = '', $selectedCars = [];
    public function deleteCar($carId)
    {
        try {
            $category = Car::find($carId);
            if ($category) {
                $category->delete();
                Toaster::success('Car deleted successfully.');
            } else {
                Toaster::error('Car not found.');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function bulkDelete()
    {
        try {
            if (count($this->selectedCars) > 0) {
                Car::whereIn('id', $this->selectedCars)->delete();
                $this->selectedCars = []; 
                Toaster::success('Selected Cars deleted successfully.');
            } else {
                Toaster::error('No Car selected for deletion.');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function render()
    {
        if (!$this->search) {
            $cars = Car::latest()->paginate(6);
        } else {
            $cars = Car::where('title', 'like', '%' . $this->search . '%')->latest()->paginate(6);
        }
        return view('livewire.car.all-cars', ['cars' => $cars])->layout('components.layouts.dashboard');
    }
}
