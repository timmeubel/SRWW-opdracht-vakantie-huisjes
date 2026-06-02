<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'inschrijving'; 
    
    public $timestamps = false;

    protected $fillable = [
        'naam',
        'email',
        'lidmaatschap',
        'personen',
        'toelichting',
        'lotings_nummer',
        'voorkeur_1',
        'voorkeur_2',
        'voorkeur_3',
        'week_voorkeur_start',
        'week_voorkeur_eind',
        'loting_id',
        'inschrijfronde_id',
    ];
}