<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Ficha;
use App\Models\Material;
use Illuminate\Support\Facades\App;


class ImprimirController extends Controller
{
    public function imprimirPersona($id){
        $persona=Persona::find($id);
        $ficha=Ficha::find($persona->ficha_id);
        $materiales=Persona::find($id)->personasMaterials;
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView('impresiones.imprimirPersona', compact('persona','ficha', 'materiales'));
       // echo "estoy dentro";
       $variable="Persona " . $persona->nyapellido .".pdf";
       return $dompdf->download($variable);
        
        /*
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa 
        $repuestos=$equipo->equiposRepuestos;
        $plans=Equipo::find($id)->equiposPlans; 
        $equiposB=Equipo::find($id)->equiposAEquiposB; 
        $pdf = PDF::loadView('impresiones.imprimirFichaEquipo', compact('equipo', 'repuestos', 'plans','equiposB'));
        $variable="Ficha " . $equipo->codEquipo .".pdf";
        return $pdf->download($variable); */
        
       //return $equipo; 
       //return view('imprimir'); 
     //  return view('imprimir2', compact('equipo'));
      // return  view('imprimir');

    }
}
