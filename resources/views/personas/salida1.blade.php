@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<style>
  
  .fondo{
       border:none;
       margin-top: 40px;
       /*width:400px; */
       border-radius:15px;
       color:rgb(237, 244, 168);
       background-image:linear-gradient(to right, #254360, #1f2b3a );
   }
   .boton{
    
    margin-bottom: 20px;
    background: linear-gradient(to right,#1b1b1d6f,#0b0a0b);
    margin-inline: 30px;
   }
   tr.new-row td {
    border-top: none;
}
 
h6 {
    text-align: center;
    font-size: 30px;
    background: -webkit-linear-gradient(rgb(4, 83, 148), rgb(225, 225, 206));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    
  }
  

</style>

@stop

@section('content_header')
<h6> Salida de materiales de canchón de fábrica</h6>

@stop

@section('content')

<div class="container fondo" >
    <form id="nuevoMatrial" action="{{route('personas.conSalida1')}}" method="POST">
    @csrf
    @method('put') 
    <input type="hidden" name="persona" value={{$persona->id}} readonly >
    <input type="hidden" name="ficha_id" value={{$persona->ficha_id}} readonly >
    <input type="hidden" name="salidaTipo" value="retorno1" readonly >
    

    <table id="table" class="table" style="color: rgb(209, 226, 208)">
        <thead>
            <tr align="center">
                <th  width=80%>Descripción</th>
                <th width=10%>Cantidad</th>
                <th width=10%>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <td ><input type="text" class="form-control" name="descripcion[]">
                    @error('descripcion[]')
                    <small>*{{$message}}</small>
                   @enderror
                </td>
                <td><input type="text" class="form-control" name="cantidad[]" /></td>
                <td><input type="text" class="form-control" name="unidad[]" /></td>
                <td><button type="button" class="btn btn-success  add-row boton">Agregar</button></td>
            </tr>
        </tbody>
    </table>
    
    <table id="table" class="table" style="color: rgb(209, 226, 208)">
        <thead>
            <tr align="center">
                <th width=15%>Retirado por</th>
                <th width=15%>Sección</th>
                <th width=40%>Destino</th>
                <th width=15%>Firmado por</th>
                <th width=15%>Vigilador</th>
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <td><input type="text" class="form-control" name="personanombre" value="{{$persona->nyapellido}}" readonly>
                </td>
                
                <td><input type="text" class="form-control" name="seccionautoriza">
                    @error('seccionautoriza')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
                
                <td><input type="text" class="form-control" name="destino">
                    @error('destino')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
                
                <td><input type="text" class="form-control" name="autorizasalida">
                    @error('autorizasalida')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>

                <td><input type="text" class="form-control" name="nombrevigilanteout">
                    @error('nombrevigilanteout')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>
    

    <div class="form-group d-flex justify-content-center">
        <button form="nuevoMatrial" class="btn btn-info  boton" type="submit" >Enviar</button>
        <a  class="btn btn-info ml-2  boton"  href="{{route('personas.index')}}">&nbsp; Salir &nbsp;</a>
      </div>
</form>
</div>
@include('partials.footer')
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var count = 1;

        $(document).on("click", ".add-row", function () {
            var new_row = $("<tr class='new-row'>");
            var column1 = $("<td>").append("<input type='text' class='form-control' name='descripcion[]'>");
            var column2 = $("<td>").append("<input type='text' class='form-control' name='cantidad[]'>");
            var column3 = $("<td>").append("<input type='text' class='form-control' name='unidad[]'>");
            var column4 = $("<td>").addClass("d-flex justify-content-between").append(
                          $("<button class='btn btn-danger boton remove-row style='margin-left: 30px; !important''>Eliminar</button>")
            );

            new_row.append(column1);
            new_row.append(column2);
            new_row.append(column3);
            new_row.append(column4);

            $("#table").append(new_row);

            count++;
        });

        $(document).on("click", ".remove-row", function () {
            if (count > 1) {
                $(this).closest("tr").remove();
                count--;
            }
        });
    });
</script>

@stop
