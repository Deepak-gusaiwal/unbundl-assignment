<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'is_featured'
    ];
    public function thumbnailImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'thumbnail');
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            CarCategory::class,
            'car_car_category'
        );
    }
}
