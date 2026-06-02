<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'huisje'; 
    
    protected $fillable = [
        'locatie',
        'capaciteit',
        'gegevens',
        'nummer',
        'huur',
    ];
}