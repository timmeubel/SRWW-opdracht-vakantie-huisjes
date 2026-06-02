<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'inschrijfronde'; 
    
    protected $fillable = [
        'begin_datum',
        'eind_datum',
    ];
}