<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datostarea['tareas']=Eventos::paginate(5);
        return view('registroEvento.index',$datostarea);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registroEvento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $espacios=['Titulo'=>'required|string|max:100','Descripcion'=>'required|string|max:100','fecha' => 'required|string|max:100','hora'=>'date_format:H:i:s','Ubicacion'=>'required|string|max:100'];

        $mensaje=['required'=>'El campo :attribute es necesario'];

        $this->validate($request, $espacios, $mensaje);

        $datos=request()->except('_token');
        Eventos::insert($datos);
        //return response()->json($datos);
        return redirect('registroEvento')->with('mensaje','Tarea agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarea=Eventos::findOrFail($id);
        return view('registroEvento.edit',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $espacios=['Titulo'=>'required|string|max:100','Descripcion'=>'required|string|max:100','fecha' => 'required|string|max:100','hora'=>'date_format:H:i:s','Ubicacion'=>'required|string|max:100'];

        $mensaje=['required'=>'El campo :attribute es necesario'];

        $this->validate($request, $espacios, $mensaje);

        $datosNuevos=request()->except(['_token','_method']);
        Eventos::where('id','=',$id)->update($datosNuevos);
        $tarea=Eventos::findOrFail($id);
        //return view('registroEvento.edit',compact('tarea'));
        return redirect('registroEvento')->with('mensaje','La tarea fue modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Eventos::destroy($id);
        return redirect('registroEvento')->with('mensaje','La tarea fue eliminada');
    }
}
