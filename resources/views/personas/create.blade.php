@extends('adminlte::page')
@section('title', 'Crear')


@section('css')
  <style>
    mi.input {
     
     border-radius: 5px;
     background-color: #787874;
     margin-right: 20px;
     margin-left: 20px; /* Añade un poco de espacio alrededor del texto dentro del select */
     font-size: 14px; /* Cambia el tamaño del texto dentro del select */
     border: 1px; /*Quita el borde predeterminado del select */
    }
    .form-control.custom {
      background-color:#dbdbd3;
      border-color: #3d3b3b;
      color: #111010;
      margin-right: 3px;
      margin-left: 3px;
      
    }
    
    .card{ 
       margin-top: 10px;
       padding: 5px;
       border:4px;
       /*width:400px; */
       border-radius:10px;
       color:rgb(243, 230, 230);
       background-image: linear-gradient(to right top, #0e3761, #6d8198,#0e3761, #7b91ab);
       /*background: linear-gradient(to left, #0e3761, #9cbfe7);*/
      }
     
  .mi-titulo {
    text-align: center; /* alinea el texto al centro */
    color: #1e1d1e; /* color del texto */
    font-size: 24px; /* tamaño de fuente */
    font-family: Arial, sans-serif; /* tipo de fuente */
    margin-top: 20px; /* margen superior */
    margin-bottom: 10px; /* margen inferior */
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
</style>

    


@stop

@section('content_header')
    <h1 style="text-align: center; padding-bottom:40px; color: #098b8b; ">Datos personales</h1>
@stop

@section('content')
   

    <div class="container card"> {{-- container principal --}}
                    <div class="mi-titulo">
                    Proviene de  {{$provieneDe}} para contactar con {{$contactoriogrande1}}:
                    </div>
        <div class="row"> {{-- row principal --}}
                    <div class="col col-md-2">
                        {{-- columna1 --}}
                    </div>
    
                    <div class="col col-md-8">
                        {{-- columna2 --}}
                        <form id="enviaPersona"  action="{{route('personas.store')}}" method="POST">
                            
                           
                          @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                      
                        
                          <div class="p-3 mb-2  text-white">
                          <div class="container">
                               
                              <div class="row"> {{-- ***** div de la primera fila --}}
                                    <div class="col col-md-6">
                                      <div class="form-group">
                                        <input type="hidden" name="ingreso" value="En planta" readonly >
                                        <input type="hidden" name="nuevoId" value="{{$id}}" readonly >
                                        <label class="control-label" for="nyapellido">Nombre y apellido:</label> 
                                        <input autocomplete="off" autofocus class="mi-input form-control rounded custom" type="text" name="nyapellido" value={{old('nyapellido')}}> 
                                        @error('nyapellido')
                                        <small>*{{$message}}</small>
                                        @enderror
                                      </div>
                                    </div> 
                                    <div class="col col-md-4">
                                      <div class="form-group">
                                        <label class="control-label" for="dni">DNI:</label> 
                                        <input autocomplete="off" class="mi-input form-control rounded custom"   type="text" name="dni" value={{old('dni')}}> 
                                        @error('dni')
                                        <small>*{{$message}}</small>
                                        @enderror
                                      </div>
                                    </div> 
                                    <div class="form-group">
                                      <label>&nbsp;</label> {{-- etiqueta vacía --}}
                                      <div>
                                          <button id="boton" form="enviaPersona"  class="btn btn-primary" type="submit" STYLE=" display:none; background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                                      </div>
                                  </div>
                              
                                    <table class="table">
                                      <div class="mi-titulo">
                                       Solicitan ingreso:
                                      </div>
                                    <tbody>
                                        @foreach ($personas as $persona)
                                        <tr>
                                          <td class="col-10">{{ $persona->nyapellido }}</td>
                                          <td class="col-2">{{ $persona->dni}}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                    <div class="form-group">
                                        <p class="btn btn-primary"><a  class="text-white " href={{route('personas.index')}}>Permitir ingreso</a></p> 
                                   </div> 
                          </div>{{-- div del container dentro de columna 2 --}}    
                          </div>{{-- div del Letra blanca --}}
                      </form>
                        
                    </div>
                    <div class="col col-md-2">
                        {{-- columna 3 --}}
                    </div>
        </div>  {{-- div del row1 Principal --}}
    </div> {{-- div del container Principal--}}
    
@stop


@section('js')

  <script>
  // Obtener los campos de texto y el botón de envío
  var nyapellido = document.getElementsByName("nyapellido")[0];
  var dni = document.getElementsByName("dni")[0];
  var botonEnviar = document.getElementById("boton");

  // Escuchar el evento keydown en nyapellido
  nyapellido.addEventListener("keydown", function(event) {
    // Si se presiona ENTER, pasar el foco a dni
    if (event.key === "Enter") {
      event.preventDefault();
      dni.focus();
    }
  });

  // Escuchar el evento keydown en dni
  dni.addEventListener("keydown", function(event) {
    // Si se presiona ENTER, hacer clic en el botón de envío
    if (event.key === "Enter") {
      event.preventDefault();
      botonEnviar.click();
    }
  });
</script>



@stop