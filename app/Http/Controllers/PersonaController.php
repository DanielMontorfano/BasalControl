<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Ficha;
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
    {   //dd ( $request->all());
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
    public function show(Persona $persona)
    {   
        return view('personas.ver');
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
       //dd ( $request->all());
       $persona= Persona::find($id);
       $selector=$request->salidaTipo;
       if($selector=="salida1"){ //salida1 reperesenta caminando con materiales, salida1 retorna a materiales.update, quien genera material y vincula a la persona

       return view('personas.salida1', compact('persona',$persona->id, $persona->ficha_id));
       }
      
       if($selector=="salida2"){ //salida1 reperesenta caminando con materiales
       // return 'Salida2';
        return view('personas.salida2', compact('persona',$persona->id, $persona->ficha_id));
       }
       
       if($selector=="salida3"){ //salida1 reperesenta caminando con materiales
        return view('personas.salida3', compact('persona',$persona->id, $persona->ficha_id));
       }
      
       if($selector=="salida4"){ //salida1 reperesenta caminando con materiales
        return view('personas.salida4', compact('persona',$persona->id, $persona->ficha_id));
       }
  
       //********$persona->ingreso=$request->ingreso;
       //********$persona->save();
      // echo "estoy en update" . $ficha;
       return redirect()->route('personas.index');
        echo"estoy en personas update";
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
