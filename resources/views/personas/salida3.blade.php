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
       background-image: linear-gradient(to right top, #1b1b1d6f, #0b0a0b, #08032158, #100f10, #1e191b);
   }
   .boton{
    
    margin-bottom: 20px;
    background: linear-gradient(to right,#1b1b1d6f,#0b0a0b);
    margin-inline: 30px;
   }
   tr.new-row td {
    border-top: none;
}

</style>

@stop

@section('content_header')
    <h1>Salida 3 Tabla autoincremental</h1>
@stop

@section('content')

<div class="container fondo" >
    <form id="nuevoMatrial" action="{{route('materials.store')}}" method="POST">
        @csrf
        <input type="hidden" name="persona" value={{$persona->id}} readonly >
        <input type="hidden" name="ficha_id" value={{$persona->ficha_id}} readonly >
        <input type="hidden" name="salidaTipo" value="retorno3" readonly >
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
                <td ><input type="text" class="form-control" name="descripcion[]" /></td>
                <td><input type="text" class="form-control" name="cantidad[]" /></td>
                <td><input type="text" class="form-control" name="unidad[]" /></td>
                <td><button type="button" class="btn btn-success  add-row boton">Agregar</button></td>
            </tr>
        </tbody>
    </table>
    <div class="form-group d-flex justify-content-center">
        <button form="nuevoMatrial" class="btn btn-info  boton " type="submit" >Enviar</button>
        <a  class="btn btn-info ml-2  boton"  href="">&nbsp; Salir &nbsp;</a>
      </div>
</form>
</div>

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
                          $("<button class='btn btn-danger  boton remove-row' style='margin-left: 30px; !important'>Eliminar</button>")
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
