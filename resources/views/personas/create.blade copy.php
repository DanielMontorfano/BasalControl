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
    </style>  


@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>edit personas</p>

    <div class="container card"> {{-- container principal --}}
      <h1>{{$id}}</h1>
        <div class="row"> {{-- row principal --}}
                    <div class="col col-md-2">
                        {{-- columna1 --}}
                    </div>
    
                    <div class="col col-md-8">
                        {{-- columna2 --}}
                        
                        <form id="myForm"  action="{{route('personas.store')}}" method="POST">
                            
                           
                            @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                        
                          
                            <div class="p-3 mb-2  text-white">
                            <div class="container">
                                 
                                <div class="row"> {{-- ***** div de la primera fila --}}
                                      <div class="col col-md-6">
                                        <div class="form-group">
                                          <input type="hidden" name="ingreso" value="En planta" readonly >
                                          <input type="hidden" name="nuevoId" value="{{$id}}" readonly >
                                          <label class="control-label" for="nyapellido">Nombre y apellido:</label> 
                                          <input autocomplete="off" class="mi-input form-control rounded custom" type="text" name="nyapellido" value={{old('nyapellido')}}> 
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
                                            <button id="boton" form="myForm" class="btn btn-primary" type="submit" STYLE="display: none; background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                                        </div>
                                    </div>
                                
                                      <table class="table">
                                        <h5>Ingresantes:</h5>
                                          
                                        <tbody>
                                          @foreach ($personas as $persona)
                                          <tr>
                                            <td class="col-10">{{ $persona->nyapellido }}</td>
                                            <td class="col-2">{{ $persona->dni}}</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                               
                               
                                <br>
                                <br>
                               {{-- <div class="form-group">
                                <button form="nuevaPersona" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button>
                                <p style="text-align: right;"><a  class="text-white " href={{route('personas.index')}}>Siguiente</a></p> 
                              </div> --}}
                                


    
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
  // Obtener los elementos del formulario
  const nyapellidoInput = document.getElementById("nyapellido");
  const dniInput = document.getElementById("dni");
  const form = document.getElementById("myForm");

  // Establecer el cursor en el primer input
  nyapellidoInput.focus();

  // Escuchar el evento 'submit' del formulario
  form.addEventListener("submit", function(event) {
    // Evitar el comportamiento por defecto del formulario
    event.preventDefault();

    // Enviar el formulario si los campos están completos
    if (nyapellidoInput.value !== "" && dniInput.value !== "") {
      alert("Formulario enviado.");
      form.submit();
    } else {
      alert("Por favor, complete todos los campos.");
    }
  });

  // Escuchar el evento 'keyup' del input 'nyapellido'
  nyapellidoInput.addEventListener("keyup", function(event) {
    // Si se presionó Enter, establecer el cursor en el siguiente input
    if (event.key === "Enter") {
      dniInput.focus();
    }
  });

  // Escuchar el evento 'keyup' del input 'dni'
  dniInput.addEventListener("keyup", function(event) {
    // Si se presionó Enter, enviar el formulario y establecer el cursor en el primer input
    if (event.key === "Enter") {
      form.submit();
      nyapellidoInput.focus();
    }
  });
</script>
@stop