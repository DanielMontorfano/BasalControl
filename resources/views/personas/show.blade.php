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
    <h6>{{$persona->nyapellido}}</h6>
@stop

@section('content')
<section style="padding-bottom:60px; ">
<div class="container ">

  <form id="nuevaFicha"  action="" method=""  >
    @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
    <div class="card  " >
      <div class="card-body" align='center'>
            <div class="row  ">
              <h2>Datos de vehiculo</h2> 
            </div>  
    <div class="row" >
      <div class="col col-md-3 form-group">
            <label class="control-label" for="tipoVehiculo">Vehículo</label> 
            <select id="tipoVehiculo" name="tipoVehiculo" class="form-select mb-3">
             
              <option value="">{{$ficha->tipoVehiculo}}</option>
              
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="estadoVehiculo">Estado</label> 
            <select id="estadoVehiculo" name="estadoVehiculo" class="form-select mb-3">
              
              <option value="">{{$ficha->estadoVehiculo}}</option>
             
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="revTecnica">Rev. técn.</label>
            <select id="revTecnica" name="revTecnica" class="form-select mb-3">
              
              <option value="">{{$ficha->revTecnica}}</option>
             
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="segVehiculo">Seg. vehic.</label>
            <select id="segVehiculo" name="segVehiculo" class="form-select mb-3">
             
              <option value="">{{$ficha->segVehiculo}}</option>
             
            </select>
          </div>
            
          </div> {{-- 1ra fila del card --}}
           
          <div class="row" >  
            <div class="col col-md-3 form-group">
                  <div class="form-select mb-3">
                    <label class="control-label" for="patentevehiculo">Chasis</label>  
                  <input id="patentevehiculo" name="patentevehiculo" title="Patente del vehículo" type="text" class="mi-input form-control rounded custom"  value={{$ficha->patentevehiculo}} readonly>
                  @error('patentevehiculo')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                
                
                </div>
            </div>
            <div class="col col-md-3 form-group">
              <div class="form-select mb-3">
                <label class="control-label" for="patenteacoplado">Acoplado</label>
                <input id="patenteacoplado" name="patenteacoplado" title="Patente del semi ó coplado" type="text" class="mi-input form-control rounded custom"  readonly value={{$ficha->patenteacoplado}} >
                @error('patenteacoplado')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
            <label class="control-label" for="tipoIngreso">{{$ficha->tipoIngreso}}</label> 
            <select id="tipoIngreso" name="tipoIngreso"  class="form-select mb-3" >
              
              <option value="">{{$ficha->tipoIngreso}}</option>
             
            </select>
          </div>

          <div class="col col-md-3 form-group">
            <label class="control-label" for="segPersonal">Seg. personal</label> 
            <select id="segPersonal" name="segPersonal" class="form-select mb-3">
             
              <option value="">{{$ficha->segPersonal}}</option>
             
            </select>
          </div>

          <div class="col col-md-3 form-group">
            <label class="control-label" for="materialSiNo">Materiales</label> 
            <select id="materialSiNo" name="materialSiNo" class="form-select mb-3" >
              <option value="">{{$ficha->materialSiNo}}</option>
              
            
            </select>
          </div>
          <div class="col col-md-3 form-group">
            <label class="control-label" for="visitasector">Sector</label> 
            <select id="visitasector" name="visitasector" class="form-select mb-3">
              <option value="">{{$ficha->visitasector}}</option>
              
            </select>
          </div>
      </div> {{-- row 2 --}}

      <div class="row" >
        <div class="col col-md-12"> 
          <input type="hidden" name="ingreso" value="En planta" readonly >
          <input id="provieneDe" name="provieneDe" type="text" class="my-input form-control rounded custom" placeholder="¿De que empresa proviene?" value="{{$ficha->provieneDe}}" readonly>
          @error('provieneDe')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
     </div>

           <div class="row" >
              <div class="col col-md-12"> 
                <input id="A_quien" name="A_quien" type="text" class="my-input form-control rounded custom" placeholder="¿A quien visita?" value="{{$ficha->contactoriogrande1}}" readonly>
                @error('A_quien')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
              </div>
       </div>
        <div class="row" >
              <div class="col col-md-12">
                  <input id="TipoDeCarga" name="TipoDeCarga" type="text" class="my-input form-control rounded custom" placeholder="¿Que tipo de carga?" value="{{$ficha->TipoDeCarga}}" readonly>
              </div>
       </div>
       <div class="row" >
            <div class="col col-md-12">
                <input id="cargaPara" name="cargaPara" type="text" class="my-input form-control rounded custom" placeholder="¿Para quién es la carga?" value="{{$ficha->cargaPara}}" readonly>
            </div>
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
      
       
    </div> {{-- card body --}}
    
    </div> {{-- card --}}
    <div class="card  " >
      <div class="card-body" align='center'>
    
              <div class="row" >
                <div class="col col-md-12">
                    <input id="nombrevigilantein" name="nombrevigilantein" type="text" class="my-input form-control rounded custom" placeholder="Nombre y apellido del vigilador" value="{{$ficha->nombrevigilantein}}" readonly>
                    @error('nombrevigilanteIn')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
      </div>
      
    </div>
     
    
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