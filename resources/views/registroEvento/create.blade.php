@extends('layouts.app')
@section('content')
    <div class="container">
<form action="{{url('/registroEvento')}}" method="post">
    @csrf
    @include('registroEvento.form',['sesion'=>'Crear']);
</form>
    </div>
@endsection
