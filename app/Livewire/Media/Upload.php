<?php

namespace App\Livewire\Media;
use App\Models\Image;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Upload extends Component
{
    public $files = [];

    public function submit()
    {
        $this->validate(
            [
                'files' => 'required|array|max:10',
                // 'files.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:1024',
            ],
            [
                'files.required' => 'You must upload at least one image file.',
                'files.max' => 'You cannot upload more than :max images.',
                'files.array' => 'The files input must be an array.',
            ]
        );

        try {
            foreach ($this->files as $file) {

                // ✅ Generate unique filename
                $filename = Str::uuid() . '.' . $file['extension'];

                // ✅ Destination path
                $destination = "uploads/{$filename}";

                // ✅ Move file from temp to public storage
                Storage::disk('public')->put(
                    $destination,
                    file_get_contents($file['path'])
                );

                // ✅ Create DB entry
                Image::create([
                    'path' => $filename,
                    'original_name' => $file['name'],
                    'extension' => $file['extension'],
                    'size' => $file['size'],
                ]);

                // ✅ Remove temp file (important)
                if (file_exists($file['path'])) {
                    unlink($file['path']);
                }
            }

            // ✅ Reset component state
            $this->reset('files');
            $this->dispatch('fetchImages');
            Toaster::success('Images uploaded successfully');
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.media.upload');
    }
}
