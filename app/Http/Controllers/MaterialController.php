<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Persona;
use App\Models\Ficha;
use App\Models\PersonaMaterial;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Genera material, vincula a la persona y da salida a la persona (retorno1) y persona con Auto (retorno3)
    {    

       // dd(request()->all());
        // Validar los datos del formulario
        $personaId=$request->persona;
        $fichaId=$request->ficha_id;  //utilizado para retorno3
        $selector=$request->salidaTipo;

        //*********************** Retorno1 ************************************************ */
        if($selector=="retorno1"){ //proviene de salida1 reperesenta caminando con materiales
        $validatedData = $request->validate([
            'descripcion.*' => 'required',
            'cantidad.*' => 'required',
            'unidad.*' => 'required',
        ]);
        
        $materialesIds = [];
        
            foreach ($validatedData['descripcion'] as $key => $value) {
                $material = new Material;
                $material->descripcion = $validatedData['descripcion'][$key];
                $material->cantidad = $validatedData['cantidad'][$key];
                $material->unidad = $validatedData['unidad'][$key];
                $material->save();
                $materialesIds[] = $material->id;
            }
        
        // Vincular los IDs de materiales con el ID de la persona en la tabla pivot "persona_materials"
        //$personaId = 5; // Reemplaza con el ID de la persona que quieras vincular los materiales
        $persona = Persona::find($personaId);
        $persona->ingreso='salió'; //Es para indicar que la persona salió
        $persona -> save();
        //La siguiente linea guarda datos de vinculo en la tabla PersonaMaterial
        $persona->personasMaterials()->attach($materialesIds); //Funciona pero no guarda time_at y udated_at ver planProtoController
        return redirect()->route('personas.index');
        }  //Sale de retorno1
        
        if($selector=="retorno2"){ //proviene de salida2 reperesenta caminando con materiales
            $persona = Persona::find($personaId);
            $persona->ingreso='salió'; //Es para indicar que la persona salió s/materiales caminando
            $persona -> save();
            return redirect()->route('personas.index');

        } 
        //*********************** Retorno3 ************************************************ */
        if($selector=="retorno3"){ //proviene de salida1 reperesenta caminando con materiales
            $validatedData = $request->validate([
                'descripcion.*' => 'required',
                'cantidad.*' => 'required',
                'unidad.*' => 'required',
            ]);
            
            $materialesIds = [];
            
                foreach ($validatedData['descripcion'] as $key => $value) {
                    $material = new Material;
                    $material->descripcion = $validatedData['descripcion'][$key];
                    $material->cantidad = $validatedData['cantidad'][$key];
                    $material->unidad = $validatedData['unidad'][$key];
                    $material->save();
                    $materialesIds[] = $material->id;
                }
            
            // Vincular los IDs de materiales con el ID de la persona en la tabla pivot "persona_materials"
            
            $persona = Persona::find($personaId);
            $persona->ingreso='salió'; 
            $persona -> save();
            //La siguiente linea guarda datos de vinculo en la tabla PersonaMaterial
            $persona->personasMaterials()->attach($materialesIds); //Funciona pero no guarda time_at y udated_at ver planProtoController
           
            //Aqui sale vehiculo!!!!
            $ficha = Ficha::find($fichaId);
            $ficha->ingreso='salió'; //Es para indicar que la persona con vehiculo salió  c/materiales y vehiculo
            $ficha-> save();

            
            return redirect()->route('personas.index');
            }  //Sale de retorno3
             
          if($selector=="retorno4"){ //proviene de salida4 reperesenta con vehiculo
            $persona = Persona::find($personaId);
            $persona->ingreso='salió'; //Es para indicar que la persona salió s/materiales caminando
            $persona -> save();

            //Aqui sale vehiculo!!!!
            $ficha = Ficha::find($fichaId);
            $ficha->ingreso='salió'; //Es para indicar que la persona salió con vehiculo y s/materiales 
            $ficha-> save();


            return redirect()->route('personas.index');

            } //Sale de retorno3

        
        





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
