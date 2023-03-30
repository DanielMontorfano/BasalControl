<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $fillable = [
        'persona_id',
        'ingreso',
        'nomEmpresa',
        'provieneDe',
        
    ];

    public function personas(){

        return $this->hasMany('App\Models\Persona'); //Por ahora no cambio conveniccion de nombres
    }

    
}
