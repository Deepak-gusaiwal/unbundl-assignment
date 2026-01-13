<?php

namespace App\Livewire\CarCategory;

use App\Models\CarCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CreateCarCategory extends Component
{
    public $title, $slug, $thumbnail;
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
    public function createCategory()
    {
        $this->slug = Str::slug($this->slug);
        $validatedData = $this->validate([
            'title' => 'required|string|unique:car_categories,title',
            'slug' => 'required|string|unique:car_categories,slug',
            'thumbnail' => 'required|exists:images,id',
        ]);

        try {
            $validatedData['slug'] = $this->generateUniqueSlug($this->slug, CarCategory::class);

            // Create a new PostCategory model instance
            CarCategory::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'thumbnail' => $validatedData['thumbnail'],
            ]);
            // Reset the form data
            $this->reset();
            $this->dispatch('resetChooseSingleImage'); //reset choose single image component on save
            Toaster::success("Car Category Created Successfully");
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
        return view('livewire.car-category.create-car-category')->layout('components.layouts.dashboard');
    }
}
