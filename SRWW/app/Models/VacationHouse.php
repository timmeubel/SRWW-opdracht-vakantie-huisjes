<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationHouse extends Model
{
    use HasFactory;

    // Voeg deze regel toe voor je huisjes:
    protected $fillable = [
        'name',
        'location',
        'guests',
        'bedrooms',
        'short_description',
        'long_description',
        'amenities',
        'image_path'
    ];
}
