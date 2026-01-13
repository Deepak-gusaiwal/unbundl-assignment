<?php

namespace App\Livewire\CarCategory;

use App\Models\CarCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditCarCategory extends Component
{
    public $categorySlug;
    public $categoryData, $title, $slug, $thumbnail;

    // slug generator function 
    private function generateUniqueSlug($slug, $model, $id, $column = 'slug')
    {
        $originalSlug = $slug;
        $count = 0;
        do {
            $query = $model::query()->where($column, $slug); // Create a NEW query instance in each iteration

            if ($id) {
                $query->where('id', '!=', $id);
            }
            if (!$query->exists())
                break;
            $count++;
            $slug = $originalSlug . '-' . $count;
        } while (true);

        return $slug;
    }
    public function mount()
    {
        $this->populateEditPostData(); // to populate richText Value
    }
    public function populateEditPostData()
    {
        try {
            $carCategory = CarCategory::where('slug', $this->categorySlug)->first();
            if (!$carCategory) {
                return redirect()->route('notFound');
            }
            $this->categoryData = $carCategory;
            $this->title = $carCategory->title;
            $this->slug = $carCategory->slug;
            $this->thumbnail = $carCategory->thumbnail;
            //to load image in form
            $this->dispatch('loadSelectedThbmbnailImage', $this->thumbnail);
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function updateCategory()
    {
        $this->slug = Str::slug($this->slug);
        $validatedData = $this->validate([
            'title' => 'required|string|unique:car_categories,title,' . $this->categoryData->id,
            'slug' => 'required|string',
            'thumbnail' => 'required|exists:images,id',
        ]);
        $validatedData['slug'] = $this->generateUniqueSlug($this->slug, CarCategory::class, $this->categoryData->id);
        try {
            $CarCategory = CarCategory::find($this->categoryData->id);
            if (!$CarCategory) {
                Toaster::error("Car Category not found.");
                return;
            }
            $CarCategory->update([ // Use update() instead of create()
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'thumbnail' => $validatedData['thumbnail'],
            ]);
            $this->reset();
            Toaster::success("Car Category Updated Successfully");
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
        return view('livewire.car-category.edit-car-category')->layout('components.layouts.dashboard');
    }
}
