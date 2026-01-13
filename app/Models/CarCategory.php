<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
    ];
    public function thumbnailImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'thumbnail');
    }
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(
            Car::class,
            'car_car_category'
        );
    }
}
