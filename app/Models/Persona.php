<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha'); //Por ahora no cambio conveniccion de nombres
    }

    public function personasMaterials()
    {
        return $this->belongsToMany('App\Models\Material', 'persona_materials');
        
    }
     
}
