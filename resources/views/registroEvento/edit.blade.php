@extends('layouts.app')
@section('content')
    <div class="container">
<form action="{{url('/registroEvento/'.$tarea->id)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('registroEvento.form',['sesion'=>'Editar']);
</form>
    </div>
@endsection

