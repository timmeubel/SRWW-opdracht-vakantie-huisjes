<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'onderhoud'; 
    
    protected $fillable = [
        'onderhoud_start',
        'onderhoud_eind',
    ];
}