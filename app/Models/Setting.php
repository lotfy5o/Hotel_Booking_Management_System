<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';


    protected $guarded = ['id'];


    //Upload Path

    const UPLOADPATH = 'images/';


    // fields that will handle upload document

    const UPLOADFIELDS = [];

    ##..........................RELATIONSHIPS

    ##..........................ATTRIBUTES

    ##..........................CUSTOM FUNCTIONS
}
