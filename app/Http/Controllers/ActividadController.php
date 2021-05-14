<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::orderBy('id')->get();
        return view('actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_profesor' => 'required',
            'id_grupo' => 'required',
            'id_categoria' => 'required',
            'nombre' => 'required',
            'horas' => 'required',
            'asistencia' => 'required',
            'anio_academico' => 'required',
            'estado' => 'required',
        ]);

        try{
            $actividad = new Actividad();
            $actividad->nombre = $request->nombre;
            $actividad->descripcion = $request->descripcion;
            $actividad->horas = $request->horas;
            $actividad->asistencia = $request->asistencia;
            $actividad->id_profesor = $request->id_profesor;
            $actividad->id_grupo = $request->id_grupo;
            $actividad->id_categoria = $request->id_categoria;
            $actividad->anio_academico = $request->anio_academico;
            $actividad->estado = $request->estado;
            $actividad->salidas_profesionales = $request->salidas_profesionales;
            $actividad->fecha_creacion = now()->getTimestamp();
            $actividad->fecha_modificacion = now()->getTimestamp();

            $actividad->save();

            return back()->with('mensaje', 'Actividad creada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al crear la actividad');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'id_profesor' => 'required',
            'id_grupo' => 'required',
            'id_categoria' => 'required',
            'nombre' => 'required',
            'horas' => 'required',
            'asistencia' => 'required',
            'anio_academico' => 'required',
            'estado' => 'required',
        ]);

        try{

            $actividad->nombre = $request->nombre;
            $actividad->descripcion = $request->descripcion;
            $actividad->horas = $request->horas;
            $actividad->asistencia = $request->asistencia;
            $actividad->id_profesor = $request->id_profesor;
            $actividad->id_grupo = $request->id_grupo;
            $actividad->id_categoria = $request->id_categoria;
            $actividad->anio_academico = $request->anio_academico;
            $actividad->estado = $request->estado;
            $actividad->salidas_profesionales = $request->salidas_profesionales;
            $actividad->fecha_modificacion = now()->getTimestamp();

            $actividad->save();

            return back()->with('mensaje', 'Actividad creada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al crear la actividad');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        //
    }
}
