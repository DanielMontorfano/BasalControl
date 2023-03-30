<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Persona;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas= Ficha::orderBy('created_at', 'desc')->get(); //Trae todos los registros
        return view('fichas.index', compact('fichas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fichas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        //dd ( $request->all());
        $ficha= new Ficha();
       // $ficha->persona_id=$request->persona_id;
        $ficha->ingreso=$request->ingreso;
       // $ficha->nomEmpresa=$request->nomEmpresa;
        $ficha->tipoVehiculo=$request->tipoVehiculo;
        $ficha->estadoVehiculo=$request->estadoVehiculo;
        $ficha->revTecnica=$request->revTecnica;
        $ficha->segVehiculo=$request->segVehiculo;
        $ficha->segPersonal=$request->segPersonal;
        $ficha->patentevehiculo=$request->patentevehiculo;
        $ficha->patenteacoplado=$request->patenteacoplado;
        $ficha->tipoIngreso=$request->tipoIngreso;
        $ficha->materialSiNo=$request->materialSiNo;
        $ficha->visitasector=$request->visitasector;
        $ficha->provieneDe=$request->provieneDe;
        $ficha->contactoriogrande1=$request->A_quien;
        $ficha->TipoDeCarga=$request->TipoDeCarga;
        $ficha->cargaPara=$request->cargaPara;

        $ficha->disponeepp=$request->disponeepp;
        $ficha->entregaepp=$request->entregaepp;
        $ficha->nombrevigilantein=$request->nombrevigilantein;
        $ficha->salida=$request->salida;
        $ficha->salidamateriales=$request->salidamateriales;
        $ficha->tipomateriales=$request->tipomateriales;
        $ficha->remito=$request->remito;
        $ficha->cantidad=$request->cantidad;
        $ficha->contactoriogrande2=$request->contactoriogrande2;
        $ficha->hora=$request->hora;
        $ficha->autorizasalida=$request->autorizasalida;
        $ficha->nombrevigilanteout=$request->nombrevigilanteout;
       
        $ficha->save();
        $nuevaFicha = Ficha::latest('id')->first();
        $id=$nuevaFicha->id;
        $provieneDe=$nuevaFicha->provieneDe;
        $contactoriogrande1=$nuevaFicha->contactoriogrande1;

       // $personas=Persona::orderBy('created_at', 'desc')->take(5)->get();
       $personas = Persona::where('ficha_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
        //return $nuevaFicha->id;
        return view ('personas.create', compact('personas','id', 'provieneDe', 'contactoriogrande1')); //se puede omitir ->id, igual funciona
        return view('equipos.show', compact('id','equipo','repuestos', 'plans','equiposB')); 
        return 'EStoy en STORE';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha $ficha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ficha_id)
    {
        //dd ( $request->all());
        $ficha= Ficha::find($ficha_id);
        $ficha->ingreso=$request->ingreso;
        $ficha->save();
       // echo "estoy en update" . $ficha;
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }
}
