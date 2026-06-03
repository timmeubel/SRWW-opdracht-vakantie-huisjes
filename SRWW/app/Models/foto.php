<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'foto'; 
    
    protected $fillable = [
        'url',
    ];
}