@extends('adminlte::page')
@section('title', 'Ficha')


@section('css')

<style>
  
    .container {
  display: flex;
  width: auto;
  justify-content: center;
  
  /*background-image: linear-gradient(to right top, #ad14146f, #070707, #13050258, #0b0a0b, #0f0a0c);*/
 
  border-color: black; 
 
  /*height: 100vh;*/
}

.row {
  margin-top: 10px;
  margin-right: 15px;
  margin-left: 15px;
}

select {
 
  border-radius: 5px;
  background-color: #b0b0ac;
  margin-left: 20px;
  margin-right: 20px;
  padding: 3px; /* Añade un poco de espacio alrededor del texto dentro del select */
  font-size: 14px; /* Cambia el tamaño del texto dentro del select */
  border: 2px; /* Quita el borde predeterminado del select */
  
}

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

 
.container1 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}


.card{ 
       margin-top: 10px;
       padding: 5px;
       border:4px;
       width: 80%; /* Cambia el valor para ajustar el ancho */
      /* margin: 0 auto; /* Centra la tarjeta horizontalmente */
       width:700px; */
       border-radius:10px;
       color:rgb(243, 230, 230);
       background-image: linear-gradient(to right top, #0e3761, #6d8198,#0e3761, #7b91ab);
       /*background: linear-gradient(to left, #0e3761, #9cbfe7);*/
      }
      

.table {
  width: 100%; /* Hace que la tabla ocupe todo el ancho disponible */
}
   .card-img-top {
      width: 100%;
      height: 12vw;
      /*color:rgb(212, 41, 41);*/
      object-fit:  fill /*cover*/;
  }

  .form-group label {
  display: block;

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
@stop

@section('content_header')
    <h6>{{$persona->nyapellido}}</h6>
    <a  class="btn btn-info ml-2  boton"  href="{{route('imprimirPersona', $persona->id)}}">imprimir</a>
@stop

@section('content')
<section style="padding-bottom:60px; ">
<div class="container ">

  <form id="nuevaFicha"  action="" method=""  >
    @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
   
    {{--Segunda fila ******************************************** --}}
    
    <div class="card  " >
      <div class="card-body" align='center'>
            <div class="row  ">
              <h2>Datos generales</h2> 
            </div>  
    
          <div class="row  ">
                  
                  
                  <label class="container1">Dispone EPP
                    <input type="checkbox" name="disponeepp" id="disponeepp" value="{{$ficha->disponeepp}}" readonly>
                  </label>
                  
                  {{-- <label class="container1">Lentes
                    <input type="checkbox"name="lentes" id="lentes" value="1">
                  </label>

                  <label class="container1">Botines
                    <input type="checkbox"  name="botines" id="botines" value="1">
                  </label> --}}

                  <label class="container1">Se otorga EPP
                    <input type="checkbox"  name="entregaepp" id="entregaepp" value="{{$ficha->entregaepp}}" readonly>
                  </label>
                
            </div>
      
            
            <div class="row  ">
              <table id="table" class="table" style="color: rgb(209, 226, 208)">
                  <tr>
                    <td> <strong>Tipo de ingreso: </strong>{{$ficha->tipoIngreso}}</td>
                  </tr>
                  <tr>
                      <td><strong>Seguro personal: </strong> {{$ficha->segPersonal}} <strong></td>
                  </tr>
                  <tr>
                      <td><strong>Ingresó materiales:</strong> {{$ficha->materialSiNo}}</td>
                  </tr>
                  <tr>
                    <td><strong>Se dirigío al sector de: </strong> {{$ficha->visitasector}}</td>
                  </tr> 
                  <tr>
                    <td><strong>Lo recibió:</strong> {{$ficha->contactoriogrande1}}</td>
                 </tr>

                  <tr>
                    <td><strong> Provenía de la empresa: </strong> {{$ficha->provieneDe}}</td>
                  </tr>
                  <tr>
                    <td><strong>La carga que traía era: </strong> {{$ficha->TipoDeCarga}}</td>
                  </tr>
                  <tr>
                    <td><strong>El destinatario de la carga fué: </strong> {{$ficha->cargaPara}}</td>
                  </tr>
                  <tr>
                    <td><strong>Se le asignó el RFID: </strong> {{$persona->rfid}}</td>
                  </tr>
             </table>
            </div> 
            










    </div> {{-- card body --}}
    
    </div> {{-- card --}}

    <div class="card  " >
      <div class="card-body" align='center'>
        <div class="row  ">
          <h5>Materiales retirados por {{$persona->nyapellido}} </h5> 
        </div> 
              <div class="row" >
                <div class="col col-md-12">
                  <table id="table" class="table" style="color: rgb(209, 226, 208)">
                    <thead>
                        <tr align="center">
                            <th  width=80%>Descripción</th>
                            <th width=10%>Cantidad</th>
                            <th width=10%>Unidad</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($materiales as $material)
                        <tr align="center">
                            <td class="text-left" >{{$material->descripcion}}</td>                         
                            <td>{{$material->cantidad}}</td>
                            <td>{{$material->unidad}}</td>
                            
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                  
                  </div>
            </div>
            <div class="row  ">
              <table id="table" class="table" style="color: rgb(209, 226, 208)">
                  <tr>
                    <td> <strong>Sección de donde vino: </strong>{{$ficha->seccionautoriza}}</td>
                  </tr>
                  <tr>
                      <td><strong>Destino de los materiales:</strong>  {{$ficha->destino}} </td>
                  </tr>
                  <tr>
                      <td><strong>Autorizó:</strong> {{$ficha->autorizasalida}}</td>
                  </tr>
                  <tr>
                    <td><strong> Fecha y hora: </strong> {{$ficha->updated_at}}</td>
                  </tr>
                  <tr>
                    <td><strong> El vigilador fué: </strong> {{$ficha->nombrevigilantein}}</td>
                  </tr>
             </table>
            </div> 
      </div>
   </div> {{-- card --}}
    
   <div class="card  " >  {{-- Datos de vehículo --}}
    <div class="card-body" align='center'>
          <div class="row  ">
            <h2>Datos del vehículo</h2> 
          </div>  
  
        <div class="row  ">
          <table id="table" class="table" style="color: rgb(209, 226, 208)">  
            <tr>
              <td> <strong>Tipo de vehiculo: </strong>{{$ficha->tipoVehiculo}}</td>
            </tr>
            <tr>
              <td> <strong>Estado del vehículo: </strong>{{$ficha->estadoVehiculo}}</td>
            </tr>
            <tr>
              <td> <strong>Revisión técnica: </strong>{{$ficha->revTecnica}}</td>
            </tr>
            <tr>
              <td> <strong>Tenía seguro: </strong>{{$ficha->segVehiculo}}</td>
            </tr>
            <tr>
              <td> <strong>Patente del vehículo: </strong>{{$ficha->patentevehiculo}}</td>
            </tr>
            <tr>
              <td> <strong>Patente del acoplado: </strong>{{$ficha->patenteacoplado}}</td>
            </tr>



          </table>        
        </div>
    </div>
  </div> {{-- card de vehículo --}} 















     <div class="form-group d-flex justify-content-center">
      {{-- Boton no visible --}}
      <a href="{{ url()->previous() }}" class="btn btn-info ">Volver</a>
      
     </div>

  </form> 
</div> {{-- Container --}}
</section>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop