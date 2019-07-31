<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'price',
        'featured',
        'negotiable',
        'ready_to_use',
        'assured',
        'purpose',
        'type',
        'image',
        'slug',
        'code',
        'bedroom',
        'bathroom',
        'living',
        'kitchen',
        'store_rooms',
        'floors',
        'parking',
        'city',
        'city_slug',
        'address',
        'build_year',
        'build_type',
        'flat_area',
        'house_area',
        'land_area',
        'agent_id',
        'contact_name',
        'contact_number',
        'alt_contact_number',
        'description',
        'video',
        'floor_plan',
        'location_latitude',
        'location_longitude',
        'property_face',
        'road_access',
        'nearby',
        'view_count',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

    public function gallery()
    {
        return $this->hasMany(PropertyImageGallery::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'property_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class)->withTimestamps();
    }

}
