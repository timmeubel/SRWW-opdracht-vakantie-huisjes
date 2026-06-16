<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // Voeg deze regel toe om de kolommen vrij te geven voor het formulier:
    protected $fillable = ['key', 'value'];
}
