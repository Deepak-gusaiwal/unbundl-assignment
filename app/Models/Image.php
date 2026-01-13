<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title',
        'path',
        'alt',
        'width',
        'height',
    ];

    public function getImageUrl(): ?string
    {
        if ($this->path) {
            $filename = $this->path;
            return asset('storage/uploads/' . $filename);
        }
        return null;
    }
}
