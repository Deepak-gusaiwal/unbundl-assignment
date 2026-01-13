<?php

namespace App\Livewire\Car;

use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditCar extends Component
{
    public $carSlug;
    public $carData, $title, $slug, $thumbnail, $categories = [];

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
            $car = Car::where('slug', $this->carSlug)->first();
            if (!$car) {
                return redirect()->route('notFound');
            }
            $this->carData = $car;
            $this->title = $car->title;
            $this->slug = $car->slug;
            $this->thumbnail = $car->thumbnail;
            $this->categories = $car->categories->pluck('id');
            //to load image in form
            $this->dispatch('loadSelectedThbmbnailImage', $this->thumbnail);
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function updateCar()
    {
        $this->slug = Str::slug($this->slug);
        $validatedData = $this->validate([
            'title' => 'required|string|unique:car_categories,title,' . $this->carData->id,
            'slug' => 'required|string',
            'thumbnail' => 'required|exists:images,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:car_categories,id',
        ]);
        $validatedData['slug'] = $this->generateUniqueSlug($this->slug, Car::class, $this->carData->id);
        try {
            $car = Car::find($this->carData->id);
            if (!$car) {
                Toaster::error("Car not found.");
                return;
            }
            $car->update([ 
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'thumbnail' => $validatedData['thumbnail'],
            ]);
            $car->categories()->sync($this->categories);
            $this->reset();
            Toaster::success("Car Updated Successfully");
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
        return view('livewire.car.edit-car', [
            'carCategories' => CarCategory::all()
        ])->layout('components.layouts.dashboard');
    }
}
