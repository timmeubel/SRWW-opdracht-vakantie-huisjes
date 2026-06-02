<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'user'; 
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'prioriteit',
        'lidmaatschap',
    ];
}