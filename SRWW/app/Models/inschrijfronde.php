<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijfronde extends Model
{
    protected $table = 'inschrijfronde'; 
    
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'begin_datum',
        'eind_datum',
    ];
}