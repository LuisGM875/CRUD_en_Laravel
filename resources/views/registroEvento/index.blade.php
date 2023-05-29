@extends('layouts.app')
@section('content')
    <div class="container">

            @if(Session::has('mensaje'))<div class="alert alert-success alert-dismissible" role="alert">Mensajes:
                {{Session::get('mensaje')}}
            @endif

        </div>

<a href="{{url('registroEvento/create')}}" class="btn btn-success">Agregar nueva tarea</a>
    <br>
    <br>
<div class="row d-flex justify-content-center">
    <div class="col-auto p-5 text-center">
<table class="table table-bordered">
    <thead>
    <tr>

        <th scope="row">Titulo</th>
        <th scope="row">Descripcion</th>
        <th scope="row">Fecha</th>
        <th scope="row">Hora</th>
        <th scope="row">Ubicacion</th>
        <th scope="row">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tareas as $tarea)
    <tr>

        <td class="">{{$tarea->titulo}}</td>
        <td>{{$tarea->descripcion}}</td>
        <td>{{$tarea->fecha}}</td>
        <td>{{$tarea->hora}}</td>
        <td>{{$tarea->ubicacion}}</td>
        <td>
            <a href="{{url('/registroEvento/'.$tarea->id.'/edit')}}" class="btn btn-warning">Editar
            </a>
             |
        <form action="{{url('/registroEvento/'.$tarea->id)}}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('¿Estas seguro de borrar?')" value="Borrar" class="btn btn-danger">
        </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
        <div class="col-auto p-2 row d-flex justify-content-center">
        {!!$tareas->links()!!}
        </div>
    </div>

</div>

    </div>
@endsection
