<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user'; 
    
    public $timestamps = false;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'prioriteit',
        'lidmaatschap',
    ];
}
