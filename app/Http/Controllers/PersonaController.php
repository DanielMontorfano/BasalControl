<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Ficha;
use App\Models\Material;
use Illuminate\Http\Request;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $personas = Persona::latest()->get();
        // $ultimosRepuestos = Repuesto::orderBy('created_at', 'desc')->take(5)->get();
        $personas = Persona::leftJoin('fichas', 'personas.ficha_id', '=', 'fichas.id')
                   ->select('personas.id','personas.nyapellido','personas.created_at', 'personas.updated_at', 'personas.ficha_id', 'fichas.tipoIngreso', 'fichas.provieneDe', 'personas.ingreso')
                   ->orderBy('personas.id', 'desc')
                   ->get();
       // return $personas;
      

            return view('personas.index',compact('personas')); //Envío todos los registro en cuestión.La consulta va sin simbolo de pesos
       // dd ($equipos->all());
       //return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $nuevoId = Ficha::latest('id')->first();
        $nuevaFicha=Ficha::find($nuevoId);
        $id=$nuevaFicha->id;
        $provieneDe=$nuevaFicha->provieneDe;
        $contactoriogrande1=$nuevaFicha->contactoriogrande1;
        //$personas=Persona::orderBy('created_at', 'desc')->take(5)->get();
        $personas = Persona::where('ficha_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
       // return $personasTodos;

       
    
       return view ('personas.create', compact('personas','id', 'provieneDe', 'contactoriogrande1'));
        return view('personas.create', compact('personas',$id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { // dd ( $request->all());
        
        $this->validate($request, [
            
            'nyapellido' => 'required',
            'dni' => 'required',
            
         ], [
            'nyapellido.required' => 'Es necesario este campo.',
            'dni' => 'Es necesario saber el dni.',
           
         ]);




        $persona= new Persona(); 
        $persona->ficha_id=$request->nuevoId;
        $persona->nyapellido=$request->nyapellido;
        $persona->ingreso=$request->ingreso;
        $persona->dni=$request->dni;
        $persona->save();
        //$ficha=Ficha::find($nuevoId);
        //dd( $request->all());
        $id=$request->nuevoId;
        $personas = Persona::where('ficha_id', $id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        
        $nuevaFicha = Ficha::latest('id')->first();
        $id=$nuevaFicha->id;
        $provieneDe=$nuevaFicha->provieneDe;
        $contactoriogrande1=$nuevaFicha->contactoriogrande1;
    
       return view ('personas.create', compact('personas','id', 'provieneDe', 'contactoriogrande1'));
        
        return view ('personas.create', compact('personas','id')); //se puede omitir ->id, igual funciona
        return redirect()->route('personas.create'); //se puede omitir ->id, igual funciona
        return 'EStoy en STORE';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //dd ($id);
        $persona=Persona::find($id);
        $ficha=Ficha::find($persona->ficha_id);
        $materiales=Persona::find($id)->personasMaterials;
        //dd ($material);
        //return $material;
        return view('personas.show', compact('persona', 'ficha', 'materiales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('personas.store');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }
    
    
    public function conSalida1(Request $request){
        //dd(request()->all());
        // Validar los datos del formulario
        $personaId=$request->persona;
        $fichaId=$request->ficha_id;  //utilizado para retorno3
        $selector=$request->salidaTipo;
        //$selector = $request->input('salidaTipo');
        $validatedData = null;
       // dd(request()->all()); 
        //*********************** Retorno1 ************************************************ */
       // if($selector==="retorno1"){ //proviene de salida1 reperesenta caminando con materiales
               
           $descripcion = $request->input('descripcion');
           $cantidad = $request->input('cantidad');
           $unidad = $request->input('unidad');
          //dd(request()->all());  
          $this->validate($request, [
            
            'descripcion.*'=> 'required',
            'seccionautoriza'=> 'required',
            'destino'=> 'required',
            'autorizasalida'=> 'required',
            'nombrevigilanteout'=> 'required',
             
        ], [
            'descripcion.required' => 'Ingresar descripcion',
            'seccionautoriza.required' => 'Ingresar de que sección proviene',
            'destino.required' => 'Ingresar el destino',
            'autorizasalida.required' => 'Ingresar quién autoriza la salida.',
            'nombrevigilanteout.required' => 'Ingresar destino del material.',
            
            
        ]);

          $validatedData = $request->validate([
            'descripcion.*' => 'required',
            'cantidad.*' => 'required|numeric|gt:0',
            'unidad.*' => 'required',
           // 'seccionautoriza'=> 'required',
           // 'destino'=> 'required',
           // 'autorizasalida'=> 'required',
           // 'nombrevigilanteout'=> 'required',
           
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
        
        $persona->ingreso='Salió'; //Es para indicar que la persona salió
        $persona -> save();
        //La siguiente linea guarda datos de vinculo en la tabla PersonaMaterial
        $persona->personasMaterials()->attach($materialesIds); //Funciona pero no guarda time_at y udated_at ver planProtoController
        $ficha= Ficha::find($fichaId);
        $ficha->seccionautoriza=$request->seccionautoriza;
        $ficha->destino=$request->destino;
        $ficha->autorizasalida=$request->autorizasalida;
        $ficha->nombrevigilanteout=$request->nombrevigilanteout;
        $ficha -> save();
        //dd(request()->all());  
        return redirect()->route('personas.index');
    }

    public function conSalida2(Request $request){
       // dd(request()->all());
        // Validar los datos del formulario
        $personaId=$request->persona;
        $fichaId=$request->ficha_id;  //utilizado para retorno3
        $selector=$request->salidaTipo;
        if($selector=="retorno2"){ //proviene de salida2 reperesenta caminando con materiales
            $persona = Persona::find($personaId);
            $persona->ingreso='Salió'; //Es para indicar que la persona salió s/materiales caminando
            $persona -> save();
        return redirect()->route('personas.index');

        } 
    }

    public function conSalida3(Request $request){
        //dd(request()->all());
        // Validar los datos del formulario
        $personaId=$request->persona;
        $fichaId=$request->ficha_id;  //utilizado para retorno3
        $selector=$request->salidaTipo;
        //$selector = $request->input('salidaTipo');
        $validatedData = null;
       // dd(request()->all()); 
        //*********************** Retorno1 ************************************************ */
       // if($selector==="retorno1"){ //proviene de salida1 reperesenta caminando con materiales
               
           $descripcion = $request->input('descripcion');
           $cantidad = $request->input('cantidad');
           $unidad = $request->input('unidad');
          //dd(request()->all());  
          $this->validate($request, [
            
            'descripcion.*'=> 'required',
            'seccionautoriza'=> 'required',
            'destino'=> 'required',
            'autorizasalida'=> 'required',
            'nombrevigilanteout'=> 'required',
             
        ], [
            'descripcion.required' => 'Ingresar descripcion',
            'seccionautoriza.required' => 'Ingresar de que sección proviene',
            'destino.required' => 'Ingresar el destino',
            'autorizasalida.required' => 'Ingresar quién autoriza la salida.',
            'nombrevigilanteout.required' => 'Ingresar destino del material.',
            
            
        ]);

          $validatedData = $request->validate([
            'descripcion.*' => 'required',
            'cantidad.*' => 'required|numeric|gt:0',
            'unidad.*' => 'required',
           // 'seccionautoriza'=> 'required',
           // 'destino'=> 'required',
           // 'autorizasalida'=> 'required',
           // 'nombrevigilanteout'=> 'required',
           
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
        
        $persona->ingreso='Salió'; //Es para indicar que la persona salió
        $persona -> save();
        //La siguiente linea guarda datos de vinculo en la tabla PersonaMaterial
        $persona->personasMaterials()->attach($materialesIds); //Funciona pero no guarda time_at y udated_at ver planProtoController
        $ficha= Ficha::find($fichaId);
        $ficha->seccionautoriza=$request->seccionautoriza;
        $ficha->destino=$request->destino;
        $ficha->autorizasalida=$request->autorizasalida;
        $ficha->nombrevigilanteout=$request->nombrevigilanteout;
        /*IMPORTANTE: la unica dif. entre salida 1 y salida3 es la linea siguiente "SALE CON VEHICULO!!!!"*/
        $ficha->ingreso='Salió'; //Es para indicar que la persona con vehiculo salió  c/materiales y vehiculo
        $ficha -> save();
        
        return redirect()->route('personas.index');
    }
    
        public function conSalida4(Request $request){
        // dd(request()->all());
         // Validar los datos del formulario
         $personaId=$request->persona;
         $fichaId=$request->ficha_id;  //utilizado para retorno3
         $selector=$request->salidaTipo;
         if($selector=="retorno4"){ //proviene de salida2 reperesenta caminando con materiales
             $persona = Persona::find($personaId);
             $persona->ingreso='Salió'; //Es para indicar que la persona salió s/materiales caminando
             $persona -> save();
         return redirect()->route('personas.index');
 
         } 
     }
 



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
