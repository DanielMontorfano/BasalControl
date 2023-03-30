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
       /*width:400px; */
       border-radius:10px;
       color:rgb(243, 230, 230);
       background-image: linear-gradient(to right top, #0e3761, #6d8198,#0e3761, #7b91ab);
       /*background: linear-gradient(to left, #0e3761, #9cbfe7);*/
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
    <h6>Permiso de ingreso y egreso IRG S.A.</h6>
@stop

@section('content')
<section style="padding-bottom:60px; ">
<div class="container ">

  <form id="nuevaFicha"  action="{{route('fichas.store')}}" method="POST"  >
    @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
    <div class="card  " >
      <div class="card-body" align='center'>
            <div class="row  ">
              <h2>Datos de vehiculo</h2> 
            </div>  
    <div class="row" >
      <div class="col col-md-3 form-group">
            <label class="control-label" for="tipoVehiculo">Vehículo</label> 
            <select id="tipoVehiculo" name="tipoVehiculo" cclass="form-select mb-3">
             
              <option value="Auto">Auto</option>
              <option value="Pick-Up">Pick-Up</option>
              <option value="Camión">Camión</option>
              <option value="Grúa">Grúa</option>
              <option value="Moto">Moto</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="estadoVehiculo">Estado</label> 
            <select id="estadoVehiculo" name="estadoVehiculo" class="form-select mb-3">
              
              <option value="Bueno">Bueno</option>
              <option value="Regular">Regular</option>
              <option value="Malo">Malo</option>
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="revTecnica">Rev. técn.</label>
            <select id="revTecnica" name="revTecnica" class="form-select mb-3">
              
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="segVehiculo">Seg. vehic.</label>
            <select id="segVehiculo" name="segVehiculo" class="form-select mb-3">
             
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
            
          </div> {{-- 1ra fila del card --}}
           
          <div class="row" >  
            <div class="col col-md-3 form-group">
                  <div class="form-select mb-3">
                  <input id="patentevehiculo" name="patentevehiculo" title="Patente del vehículo" type="text" class="mi-input form-control rounded custom" placeholder="Patente vehic.">
                </div>
            </div>
            <div class="col col-md-3 form-group">
              <div class="form-select mb-3">
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
          <div class="col col-md-3 form-group">
            <label class="control-label" for="tipoIngreso">Ingreso</label> 
            <select id="tipoIngreso" name="tipoIngreso"  class="form-select mb-3" >
              
              <option value="Vista">Visita</option>
              <option value="Proveedor">Proveedor</option>
            </select>
          </div>

          <div class="col col-md-3 form-group">
            <label class="control-label" for="Seguro Per.">Seguro personal</label> 
            <select id="segPersonal" name="Seguro personal" class="form-select mb-3">
             
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="col col-md-3 form-group">
            <label class="control-label" for="materialSiNo">Materiales</label> 
            <select id="materialSiNo" name="materialSiNo" class="form-select mb-3" >
              <option value="No">No</option>
              <option value="Si">Si</option>
            
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="visitasector">Sector</label> 
            <select id="visitasector" name="visitasector" class="form-select mb-3">
              <option value="Administ.">Administración</option>
              <option value="Of. téncnica">Of. técnica</option>
              <option value="Of. pesonal">Of. personal</option>
              <option value="Dep. azúcar">Dep. azúcar</option>
              <option value="Dep. materiales">Dep. materiales</option>
            </select>
          </div>
      </div> {{-- row 2 --}}

      <div class="row" >
        <div class="col col-md-12"> 
          <input type="hidden" name="ingreso" value="En planta" readonly >
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
     
    
     <div class="form-group d-flex justify-content-center">
      {{-- Boton no visible --}}
      <button id="enviar" form="nuevaFicha" form="nuevoMatrial" class="btn btn-info  boton" type="submit" >Guardar y continuar</button> 
     </div>
  </form>
  
</div> {{-- Container --}}
</section>
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