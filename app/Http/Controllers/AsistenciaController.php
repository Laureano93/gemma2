<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::orderBy('id')->get();
        return view('asistencia.index', compact('asistencias'));
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
            'id_alumno' => 'required',
            'id_grupo' => 'required',
            'justificada' => 'required',
            'ausente' => 'required',
        ]);

        try{
            $asistencia = new Asistencia();
            $asistencia->id_alumno = $request->id_alumno;
            $asistencia->id_grupo = $request->id_grupo;
            $asistencia->justificada = $request->justificada;
            $asistencia->ausente = $request->ausente;
            $asistencia->fecha_creacion = now()->getTimestamp();
            $asistencia->fecha_modificacion = now()->getTimestamp();

            $asistencia->save();

            return back()->with('mensaje', 'Asistencia creada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido crear la asistencia');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_grupo' => 'required',
            'justificada' => 'required',
            'ausente' => 'required',
        ]);

        try{
            $asistencia->id_alumno = $request->id_alumno;
            $asistencia->id_grupo = $request->id_grupo;
            $asistencia->justificada = $request->justificada;
            $asistencia->ausente = $request->ausente;
            $asistencia->fecha_modificacion = now()->getTimestamp();

            $asistencia->save();

            return back()->with('mensaje', 'Asistencia modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido modificar la asistencia');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
