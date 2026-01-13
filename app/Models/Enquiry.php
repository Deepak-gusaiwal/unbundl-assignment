<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    protected $fillable = [
        'car_id',
        'name',
        'phone_number',
        'email',
        'address',
        'message',
    ];
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
