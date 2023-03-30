@extends('adminlte::page')
@section('title', 'Personas')
@section('css')

<style>


  #listado {
    background: linear-gradient(to left, #0e3761, #9cbfe7);
}
#listado td {
    color: rgba(234, 234, 193, 0.658);
    font-size: 20px;
}
#listado thead {
  background-color: black;
}

#listado td.encabezado {
  color: red;
  
}
.btn-gradient {
    background-image: linear-gradient(to right, #0e3761, #9cbfe7 );
    color: #090a0a; 
    font-weight: bold; 
    font-size: 14px; 
    font-family: Times New Roman;
    text-align: center; 
    border-radius: 5px;
    padding: 6px 12px;
    border: none;
  }
  .btn-gradient1 {
    background-image: linear-gradient(to right, #ef0e0e, #b8abad );
    color: #090a0a; 
    font-weight: bold; 
    font-size: 30px; 
    font-family: Times New Roman;
    text-align: center; 
    border-radius: 5px;
    padding: 3px 3px;
    border: none;
  }
  .btn-icon {
  background-repeat: no-repeat;
  background-size: contain;
  padding-left: 30px; /* Ajusta el padding según el ancho del icono */
 
 
}

.con-materiales {
  background-image: url('{{ asset('iconos/caja.svg') }}');

}

.sin-materiales {
  background-image: url('{{ asset('iconos/sinCaja.svg') }}');
}

  h6 {
    text-align: center;
    font-size: 50px;
    background: -webkit-linear-gradient(rgb(4, 83, 148), rgb(225, 225, 206));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }

  
</style>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
@endsection
@section('content_header')
<h6>Permiso de ingreso y egreso IRG S.A.</h6>
@stop
@section('content')

{{--<h1></h1> --}}
<h1></h1>
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- <a href="/Equipos/crear" > Crear curso</a> **Laravel no recomienda direccionar asi--}}
<section style="padding-bottom:10px; ">
<div class="card border-primary " style="background: linear-gradient(to right, #0e3761, #9cbfe7 );">
<div class="card-body"  style="max-width: 100%;">
<div class="text-white card-body "  style="max-width: 100%;">
 

<table id="listado" class="table  table-striped table-success  table-hover border-4" >
    <thead class="table-dark" >
        
        <td>Persona</td>
        <td>Tipo</td>
        <td>Empresa</td>
        <td>Estado</td>
        <td>Salidas</td>
       
    <tbody>
      @foreach ($personas as $persona)
      <tr STYLE="text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">
        
        <td STYLE="font-weight:bold; text-align:left; color: #090a0a; font-family: Times New Roman;  font-size: 14px; ">{{$persona->nyapellido}}</td>
        <td>{{$persona->tipoIngreso}}</td>
        <td>{{$persona->provieneDe}}</td>
        <td>{{$persona->ingreso}}</td>
        @if($persona->ingreso =='En planta') {{-- Para saber si es repuesto o no --}}
        <td>
          <div class="d-flex">
            <form action="{{route('personas.update', $persona->id)}}" method="POST">
              @csrf
              @method('put')
              <input type="hidden" name="salidaTipo" value="salida1" readonly >
              <input  hidden type="text" name="ingreso" value="salió" id="">
              <input  hidden type="text" name="ficha_id" value="{{$persona->ficha_id}}" id="">
              <button title="Sale caminando con materiales" type="submit" class="btn btn-gradient1 mr-1">
                <img src="{{ asset('iconos/conCajaPng.png') }}" alt="con Caja" width="32" height="32" ;>   
               
              </button>
            </form>
            
            <form action="{{route('personas.update', $persona->id)}}" method="POST">
              @csrf
              @method('put')
              <input type="hidden" name="salidaTipo" value="salida2" readonly >
              <input hidden type="text" name="ingreso" value="salió" id="">
              <input  hidden type="text" name="ficha_id" value="{{$persona->ficha_id}}" id="">
              <button title="Sale caminando sin materiales"type="submit" class="btn btn-gradient1 mr-1">
                <img src="{{ asset('iconos/sinCajaPng.png') }}" alt="sin Caja" width="32" height="32" ;> 
                
              </button>
            </form>
            
            <form action="{{route('personas.update', $persona->id)}}" method="POST">
              @csrf
              @method('put')
              <input type="hidden" name="salidaTipo" value="salida3" readonly >
              <input hidden type="text" name="ingreso" value="salió" id="">
              <input  hidden type="text" name="ficha_id" value="{{$persona->ficha_id}}" id="">
              <button title="Sale vehículo con materiales" type="submit" class="btn btn-gradient1 mr-1 ">
                <img src="{{ asset('iconos/CamionLindo1.png') }}" alt="Icono lindo 1" width="32" height="32" ;>
              
              </button>
            </form>
            <form action="{{route('personas.update', $persona->id)}}" method="POST">
              @csrf
              @method('put')
              <input type="hidden" name="salidaTipo" value="salida4" readonly >
              <input hidden type="text" name="ingreso" value="salió" id="">
              <input  hidden type="text" name="ficha_id" value="{{$persona->ficha_id}}" id="">
              <button title="Sale vehículo sin materiales" type="submit" class="btn btn-gradient1 mr-1 ">
                <img src="{{ asset('iconos/CamionLindo2.png') }}" alt="Icono lindo 1" width="32" height="32" ;>
              </button>
            </form>
            
            
            
        </div>
          {{-- <a class="bi bi-eye" href="{{route('personas.show', $persona->id)}}"></a> --}}
        </td>
        @endif
        @if($persona->ingreso =='salió') {{-- Para saber si es repuesto o no --}}
        <td><button class="btn btn-gradient">{{$persona->created_at}} &nbsp;/&nbsp; {{$persona->updated_at}}</button></td> 
        @endif

      </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</div>
@include('partials.footer')
</section>

{{-- aqui Todos los script ver plantilla--}}


@endsection

@section('js')


@stop



