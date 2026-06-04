<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huisje extends Model
{
    protected $table = 'huisje'; 
    
    public $timestamps = false;
    
    protected $fillable = [
        'locatie',
        'capaciteit',
        'gegevens',
        'nummer',
        'huur',
    ];
}