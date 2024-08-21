<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';


    protected $guarded = ['id'];

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
