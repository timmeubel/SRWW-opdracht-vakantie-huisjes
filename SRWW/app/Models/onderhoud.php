<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onderhoud extends Model
{
    protected $table = 'onderhoud'; 
    
    public $timestamps = false;
    
    protected $fillable = [
        'onderhoud_start',
        'onderhoud_eind',
    ];
}