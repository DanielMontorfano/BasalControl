@extends('adminlte::page')

@section('css')
<style>
    
    h1{
    background: -webkit-linear-gradient(rgb(16, 121, 165),rgb(236, 229, 229));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
     padding-bottom: 100px;
    color: tomato;  
    
    }
  .card{
       border:none;
       /*width:400px; */
       border-radius:15px;
       color:rgb(237, 30, 30);
       background-image: linear-gradient(to right top, #ddd4d76f, #0b0a0b);
       
   }
  
   .card-img-top {
      width: 100%;
      height: 12vw;
      /*color:rgb(212, 41, 41);*/
      object-fit:  fill /*cover*/;
  }
  
  
  /* Estilos para el elemento <p> */
  p {
    font-size: 18px; /* Tamaño de letra */
    color: #eaede9; /* Color de texto */
    font-family: Arial, sans-serif; /* Fuente */
    margin: 20px; /* Márgenes */
  }


  </style>
@stop

@section('content_header')
<h1 align='center'STYLE="text-align:center; font-size: 60px; ">Permiso de ingreso</h1>
@stop

@section('content')

<div class="container">
    <div class="row">
            <div class="col col-md-3">
              {{-- Columna 1 --}}
              <div class="card  " >
                <div class="card-body" align='center'>
                    <img src={{asset('iconos\list1.png')}}  class="card-img-top" alt="...">
                    <p>Estado actual</p>
                    <a href="{{route('personas.index')}}" class="btn stretched-link"></a> 
                    {{-- <a href="#" class="btn stretched-link"></a> --}}
                  </div>
                </div>
            </div>
             
            <div class="col col-md-3">
              {{-- Columna 1 --}}
              <div class="card  " >
                <div class="card-body" align='center'>
                  <img src={{asset('iconos\permiso5.png')}}  class="card-img-top" alt="...">
                   
                    <p>Nuevo ingreso</p>
                    <a href="{{route('fichas.create')}}" class="btn stretched-link"></a> 
                    {{-- <a href="#" class="btn stretched-link"></a> --}}
                  </div>
                </div>
            </div>

            

     </div>
</div> {{-- Fin contenedor --}}  
<div class="container">
@include('partials.footer') 
</div>       
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop