<?php

namespace App\Livewire\CarCategory;

use App\Models\CarCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AllCarCategories extends Component
{
    use WithPagination;
    public $search = '',$selectedCategories=[];
    public function deleteCategory($categoryId)
    {
        try {
            $category = CarCategory::find($categoryId);
            if ($category) {
                $category->delete();
                Toaster::success('Category deleted successfully.');
            } else {
                Toaster::error('Category not found.');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function bulkDelete()
    {
        try {
            if (count($this->selectedCategories) > 0) {
                CarCategory::whereIn('id', $this->selectedCategories)->delete();
                $this->selectedCategories = []; // Clear selected categories after deletion
                Toaster::success('Selected categories deleted successfully.');
            } else {
                Toaster::error('No categories selected for deletion.');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }

    public function render()
    {
        if (!$this->search) {
            $categories = CarCategory::latest()->paginate(6);
        } else {
            $categories = CarCategory::where('title', 'like', '%' . $this->search . '%')->latest()->paginate(6);
        }
        return view('livewire.car-category.all-car-categories', ['categories' => $categories])->layout('components.layouts.dashboard');
    }
}
