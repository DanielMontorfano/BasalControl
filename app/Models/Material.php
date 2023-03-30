<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable =['descripcion',
    'cantidad',
    'unidad',
  
    
    
];
    //relacion de muchos a muchos
    public function materialPersonas()
    {
        return $this->belongsToMany('App\Models\Persona');
       // ->withPivot('cant','unidad');
        
        
    } 
}
