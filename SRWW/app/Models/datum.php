<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datum extends Model
{
    protected $table = 'datum'; 
    
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'date',
    ];
}