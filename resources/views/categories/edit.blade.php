@extends('layouts.app')
@section('content')
<!--index de categorias-->

<div class="container">

 
<div class="card">
  <div class="card-header bg-danger text-white">
     Edicion de Categorias
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <!--<a href="{{ route('categories.create') }}" class="btn btn-primary">AGREGAR</a>  -->   
    <a href="{{ route('categories.index') }}" class="btn btn-primary">REGRESAR</a> 

  <!--creación de formulario para actualizar-->
  {!! Form::open(['route'=>['categories.update','$category'],'method'=>'PUT']) !!}

{!! Field::text('name',$category->name,['label'=>'Nombres','placeholder'=>'Ingrese el Nombre'])!!}
{!! Field::textarea('description',$category->description,['label'=>'Descripión','placeholder'=>'Ingrese la Desripción'])!!}
{!! Form::submit('Grabar',['class'=>'btn btn-danger']) !!}

{!! Form::close() !!}
  </div>
</div>



</div>


@endsection