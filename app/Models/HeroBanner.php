<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroBanner extends Model
{
    protected $fillable = [
        'thumbnail',
        'top_heading',
        'bottom_heading',
        'description',
    ];

    // for image data
    public function thumnailImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'thumbnail');
    }
}
