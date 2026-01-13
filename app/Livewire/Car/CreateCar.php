<?php

namespace App\Livewire\Car;

use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CreateCar extends Component
{
    public $title, $slug, $thumbnail, $categories = [], $isFeatured = false;
    // generate slug on title update
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }
    //to generate unique slugs
    private function generateUniqueSlug($slug, $model, $column = 'slug')
    {
        $originalSlug = $slug;
        $count = 0;

        while ($model::where($column, $slug)->exists()) {
            $count++;
            $slug = $originalSlug . '-' . $count;
        }

        return $slug;
    }
    public function toggleFeatured()
    {
        $this->isFeatured = !$this->isFeatured;
    }
    public function createCar()
    {
        $this->slug = Str::slug($this->slug);
        $validatedData = $this->validate([
            'title' => 'required|string|unique:car_categories,title',
            'slug' => 'required|string|unique:car_categories,slug',
            'thumbnail' => 'required|exists:images,id',
            'isFeatured' => 'nullable|boolean',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:car_categories,id',
        ]);
        try {
            $validatedData['slug'] = $this->generateUniqueSlug($this->slug, Car::class);

            $car = Car::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'thumbnail' => $validatedData['thumbnail'],
                'is_featured' => $validatedData['isFeatured'] ?? true,
            ]);
            $car->categories()->attach($this->categories);
            // Reset the form data
            $this->reset();
            $this->dispatch('resetChooseSingleImage'); //reset choose single image component on save
            Toaster::success("Car Created Successfully");
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
        return view('livewire.car.create-car', [
            'carCategories' => CarCategory::all()
        ])->layout('components.layouts.dashboard');
    }
}
