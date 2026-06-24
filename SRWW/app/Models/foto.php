<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto'; 
    
    public $timestamps = false;
    
    protected $fillable = [
        'url',
        'vacation_house_id',
        'sort_order',
    ];

    public function vacationHouse()
    {
        return $this->belongsTo(VacationHouse::class, 'vacation_house_id');
    }
}