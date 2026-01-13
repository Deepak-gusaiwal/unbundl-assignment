<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSettings extends Model
{
     protected $fillable = [
        'site_name',
        'header_logo',
    ];

    // for image data
    public function headerLogoImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'header_logo');
    }

}
