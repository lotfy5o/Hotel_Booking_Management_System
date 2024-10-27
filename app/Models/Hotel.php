<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'hotels';


    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    //Upload Path

    const UPLOADPATH = 'images/';


    // fields that will handle upload document

    const UPLOADFIELDS = [];

    ##..........................RELATIONSHIPS

    ##..........................ATTRIBUTES

    ##..........................CUSTOM FUNCTIONS
}
