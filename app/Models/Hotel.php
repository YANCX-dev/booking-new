<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use hasFactory;

    protected $fillable = [
        'name',
        'rating',
//        'country_id'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function rooms():hasMany
    {
        return $this->hasMany(Room::class);
    }

    protected function getCountryNameAttribute()
    {
        return $this->country->name;
    }
}
