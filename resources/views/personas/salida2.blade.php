@extends('adminlte::page')
@section('title', 'Dashboard')

@section('css')
<style>
  
  
  .card{
       border:none;
       /*width:400px; */
       border-radius:15px;
       color:rgb(237, 244, 168);
       background-image: linear-gradient(to right top, #1b1b1d6f, #0b0a0b, #08032158, #100f10, #1e191b);
   }
   .boton{
    
    margin-bottom: 20px;
    background: linear-gradient(to right,#1b1b1d6f,#0b0a0b);
    margin-inline: 30px;
   }
</style>

@stop


@section('content_header')
    <h1></h1>

@stop

@section('content')
<div class="container">
    <form id="nuevoMatrial" action="{{route('materials.store')}}" method="POST">
        @csrf
        <input type="hidden" name="persona" value={{$persona->id}} readonly >
        <input type="hidden" name="ficha_id" value={{$persona->ficha_id}} readonly >
        <input type="hidden" name="salidaTipo" value="retorno2" readonly >
        <div class="container d-flex justify-content-center" style="height: 55vh;">
            <div class="card backCard" style="width: 400px; margin-top: auto; margin-bottom: auto;">
                <div class="card-body text-center">
                    <h5 class="card-title"></h5>
                    <p class="card-text"><h4>¿Está persona está saliendo sin materiales?</h4></p>
                    
                    <img src="{{ asset('iconos/sinCajaPng.png') }}" alt="Imagen" style="width: 200px; height: auto; margin-bottom: 20px;">
                    <div class="form-group d-flex justify-content-center">
                        <button form="nuevoMatrial" class="btn btn-info  boton" type="submit" >Si</button>
                        <a  class="btn btn-info ml-2  boton"  href="">No</a>
                      </div>
                </div>
            </div>
        </div>
    </form>

</div>
    
     

@stop

@section('js')
    <script>
        if (typeof jQuery == 'undefined') {
            console.log('jQuery no está cargado.');
        } else {
            console.log('jQuery está cargado.');
        }
    </script>
@stop
