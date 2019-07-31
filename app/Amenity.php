<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = ['name'];

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }
}
