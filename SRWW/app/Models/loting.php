<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    protected $table = 'loting'; 
    
    protected $fillable = [
        'winnaar',
    ];
}