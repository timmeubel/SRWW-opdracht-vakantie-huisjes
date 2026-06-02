<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'inschrijving'; 
    
    protected $fillable = [
        'naam',
        'email',
        'lidmaatschap',
        'personen',
        'toelichting',
        'lotingsnummer',
        'voorkeur',
        'weeknummer',
    ];
}