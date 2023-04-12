<!DOCTYPE html>
<head>
    <style>
    /**
    Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
    puede ser de altura y anchura completas.
    **/
    @page {
    margin: 0.5cm 0.5cm;
    }
    
    /** Defina ahora los márgenes reales de cada página en el PDF **/
    body {
     
     margin-top: 4.5cm;
     margin-left: 2cm;
     margin-right: 2cm;
     margin-bottom: 3.5cm;
     }
     
     
     /** Definir las reglas del encabezado **/
     header {
       background-color: transparent; 
     position: fixed;
     top: 0cm;
     left: 0cm;
     right: 0cm;
     height: 4cm;
     
     /** Estilos extra personales **/
     background-color: transparent;
     color: black;
     text-align: center;
     line-height: .5cm;
     }
     
     /** Definir las reglas del pie de página **/
     footer {
     background-color: transparent;  
     position: fixed;
     bottom: 0.5cm;
     left: 0cm;
     right: 0cm;
     height: 2.5cm;
     
     /** Estilos extra personales **/
     background-color:white;
     color: black;
     text-align: center;
     line-height: 0.5cm;
     }
     
     
    </style>
    </head>
<body>
    <header>
        <TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
            <TR ALIGN=center >
        
            <TD ROWSPAN=3 Width=20% valign= middle> <img src="iconos/logoIngenio2.png"   height="100px" width="130px"/></TD>
                <TD ROWSPAN=3 Width=60%><h1>Ficha de Ingreso</h1><h2>{{$persona->nyapellido}}</h2></TD>
                <TD> {{$ficha->created_at}}</TD>
              
            </TR>
            <TR>
                <TD>{{$ficha->updated_at}}</TD>
            </TR>
            <TR>
                <TD>RFID:{{$persona->rfid}}</TD>
            </TR>
            
            
        
        </TABLE>
        </header>
        
        
<main>
    <div class="container">
        <div >
            <h3>Datos generales</h3> 
          </div>
       
              <table id="table" class="table" style="color: rgb(10, 10, 10)">
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
       
   </table>

   <div >
    <h3>Materiales retirados</h3> 
  </div> 
        
             <table id="table" class="table" style="color: rgb(13, 14, 13)">
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
           
          <div >
            <h3>Datos del vehículo</h3> 
          </div>
          <table id="table" class="table" style="color: rgb(15, 16, 15)">  
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








    </div> {{-- container --}}
</main>
<footer>
    <!-- Copyright © <?php echo date("Y");?> -->
    
    <br><br>
    <TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
        <TR  ALIGN=center>
    
        <TD Width=25% valign= middle> Revisión</TD>
        <TD Width=25% valign= middle> Elaboración</TD>
        <TD Width=50% colspan="2" valign= middle> Aprobaciones</TD>  
        
        </TR>
        <TR>
            <TD valign= top ><br></TD>
            <TD style="text-align: center"  >Equipo de calidad</TD>
            <TD height="55px" valign= top >&nbsp; Area origen:<br></TD>
            <TD valign= top >&nbsp; Area usuaria:</TD>
        </TR>
        
        
    
    </TABLE>
    </footer> 

</body>
</html>