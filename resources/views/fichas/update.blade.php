@extends('adminlte::page')
@section('title', 'Salida')


@section('css')

<style>
  
    .container {
  display: flex;
  width: 800px;
  justify-content: center;
  background-image: linear-gradient(to right top, #0c0b0b6f, #070707, #13050258, #0b0a0b, #0f0a0c);
 
  border-color: black; 
  
  height: 100vh;
}

.row {
  margin-top: 10px;
  margin-right: 15px;
  margin-left: 15px;
}

select {
 
  border-radius: 5px;
  background-color: #b0b0ac;
  margin-left: 15px;
  margin-right: 15px;
  padding: 3px; /* Añade un poco de espacio alrededor del texto dentro del select */
  font-size: 14px; /* Cambia el tamaño del texto dentro del select */
  border: 2px Quita el borde predeterminado del select */
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
  background-color:   #787874;
  border-color: #3d3b3b;
  color: #111010;
  margin-right: 5px;
  margin-left: 5px;
  
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
       /*width:400px; */
       border-radius:10px;
       color:rgb(243, 230, 230);
       background-image: linear-gradient(to right top, #30141e6f, #0b0a0b, #21080358, #1d181a, #1e191b);
   }
  
   .card-img-top {
      width: 100%;
      height: 12vw;
      /*color:rgb(212, 41, 41);*/
      object-fit:  fill /*cover*/;
  }


</style>
@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container ">
  <form id="nuevaFicha"  action="{{route('fichas.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
    @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
    <div class="card  " >
      <div class="card-body" align='center'>
            <div class="row  ">
              <h2>Datos de vehiculo</h2> 
            </div>  
    <div class="row" >
          <div class="col">
            
            <select id="tipoVehiculo" name="tipoVehiculo" class="form-select">
              <option value="Vehículo">Vehículo</option>
              <option value="Auto">Auto</option>
              <option value="Pick-Up">Pick-Up</option>
              <option value="Camión">Camión</option>
              <option value="Grúa">Grúa</option>
              <option value="Moto">Moto</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="col">
            <select id="estadoVehiculo" name="estadoVehiculo" class="form-select">
              <option value="Estado">Estado</option>
              <option value="Bueno">Bueno</option>
              <option value="Regular">Regular</option>
              <option value="Malo">Malo</option>
            </select>
          </div>
          <div  class="col">
            <select id="revTecnica" name="revTecnica" class="form-select">
              <option value="Rev. técn.">Rev. técn.</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
          <div  class="col">
            <select id="segVehiculo" name="segVehiculo" class="form-select">
              <option value="Seg. vehic.">Seg. vehic.</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
            <div class="col">
              <select id="segPersonal" name="segPersonal" class="form-select">
                <option value="Seg. personal">Seg. personal</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
          </div> {{-- 1ra fila del card --}}
           
          <div class="row" >  
                <div class="col">
                  <div class="form-select">
                  <input id="patentevehiculo" name="patentevehiculo" title="Patente del vehículo" type="text" class="mi-input form-control rounded custom" placeholder="Patente vehic.">
                </div>
            </div>
            <div class="col">
              <div class="form-select">
                <input id="patenteacoplado" name="patenteacoplado" title="Patente del semi ó coplado" type="text" class="mi-input form-control rounded custom" placeholder="Patente chasis">
              </div>
            </div> 
          </div> {{-- 1ra fila del card --}}
    </div> {{-- card body --}}
    </div> {{-- card --}}



    {{--Segunda fila ******************************************** --}}
    
    <div class="card  " >
      <div class="card-body" align='center'>
            <div class="row  ">
              <h2>Datos generales</h2> 
            </div>  
    <div class="row" >
          <div class="col col-md-4">
            <label class="control-label" for="tipoIngreso">Ingreso</label> 
            <select id="tipoIngreso" name="tipoIngreso" class="form-select" >
              
              <option value="Vista">Visita</option>
              <option value="Proveedor">Proveedor</option>
            </select>
          </div>
          <div class="col col-md-4">
            <label class="control-label" for="materialSiNo">Materiales</label> 
            <select id="materialSiNo" name="materialSiNo" class="form-select" >
              <option value="No">No</option>
              <option value="Si">Si</option>
            
            </select>
          </div>
          <div class="col col-md-4">
            <label class="control-label" for="visitasector">Sector</label> 
            <select id="visitasector" name="visitasector" class="form-select">
              <option value="Administración">Administación</option>
              <option value="Of. téncnica">Of. técnica</option>
              <option value="Of. pesonal">Of. personal</option>
              <option value="Dep. azúcar">Dep. azúcar</option>
              <option value="Dep. materiales">Dep. materiales</option>
            </select>
          </div>
      </div> {{-- row 2 --}}

      <div class="row" >
        <div class="col col-md-12"> 
          <input id="provieneDe" name="provieneDe" type="text" class="my-input form-control rounded custom" placeholder="¿De que empresa proviene?">
        </div>
     </div>

      <div class="row" >
              <div class="col col-md-12"> 
                <input id="A_quien" name="A_quien" type="text" class="my-input form-control rounded custom" placeholder="¿A quien visita?">
              </div>
       </div>
        <div class="row" >
              <div class="col col-md-12">
                  <input id="TipoDeCarga" name="TipoDeCarga" type="text" class="my-input form-control rounded custom" placeholder="¿Que tipo de carga?">
              </div>
       </div>
       <div class="row" >
            <div class="col col-md-12">
                <input id="cargaPara" name="cargaPara" type="text" class="my-input form-control rounded custom" placeholder="¿Para quién es la carga?">
            </div>
       </div>
       
      
          <div class="row  ">
                  
                  
                  <label class="container1">Casco
                    <input type="checkbox" name="casco" id="casco" value="1">
                  </label>
                  
                  <label class="container1">Lentes
                    <input type="checkbox"name="lentes" id="lentes" value="1">
                  </label>

                  <label class="container1">Botines
                    <input type="checkbox"  name="botines" id="botines" value="1">
                  </label>

                  <label class="container1">Se otorga EPP
                    <input type="checkbox" checked="checked" name="epp" id="epp" value="1">
                  </label>
                
            </div>
      
       
    </div> {{-- card body --}}
    
    </div> {{-- card --}}
    <div class="card  " >
      <div class="card-body" align='center'>
    
              <div class="row" >
                <div class="col col-md-12">
                    <input id="nombrevigilateIn" name="nombrevigilateIn" type="text" class="my-input form-control rounded custom" placeholder="Nombre y apellido del vigilador">
                </div>
            </div>
      </div>
    </div>

    <div class="form-group">
      {{-- Boton no visible --}}
      <button id="enviar" form="nuevaFicha" class="btn btn-primary" type="submit" STYLE=" background: linear-gradient(to right,#495c5c,#030007);">Enviar</button> 
     </div>
  </form>
</div> {{-- Container --}}
@stop


@section('js')
<script>
    var select = document.getElementById("uniTiempoSelect");
    select.addEventListener("change", function() {
      select.blur(); // desenfoca el select
      document.getElementById("descripcion").focus(); // enfoca otro elemento
    });
  </script>
@stop