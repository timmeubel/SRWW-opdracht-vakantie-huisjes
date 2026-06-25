<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VacationHouse;

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

    public function loting()
    {
        return $this->belongsTo(Loting::class);
    }

    public function inschrijfronde()
    {
        return $this->belongsTo(Inschrijfronde::class);
    }

    public function getHuisjeAttribute()
    {
        $house = VacationHouse::where('name', $this->voorkeur_1)->first();
        if ($house) {
            return (object)[
                'naam' => $house->name,
                'name' => $house->name,
            ];
        }
        return null;
    }

    public function getStartdatumAttribute()
    {
        return $this->week_voorkeur_start;
    }

    public function getEinddatumAttribute()
    {
        return $this->week_voorkeur_eind;
    }
}