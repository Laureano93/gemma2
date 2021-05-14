<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'id_actividad' => 'required',
            'especialidad' => 'required',
            'titulacion' => 'required'
        ]);

        try{
            $titulacion = new Titulacion();
            $titulacion->id_profesor = $request->id_profesor;
            $titulacion->id_actividad = $request->id_actividad;
            $titulacion->especialidad = $request->especialidad;
            $titulacion->titulacion = $request->titulacion;
            $titulacion->save();

            return back()->with('mensaje', 'Titulación creada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido crear la titulación');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Titulacion $titulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulacion $titulacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulacion $titulacion)
    {
        $request->validate([
            'id_profesor' => 'required',
            'id_actividad' => 'required',
            'especialidad' => 'required',
            'titulacion' => 'required'
        ]);

        try{
            $titulacion->id_profesor = $request->id_profesor;
            $titulacion->id_actividad = $request->id_actividad;
            $titulacion->especialidad = $request->especialidad;
            $titulacion->titulacion = $request->titulacion;
            $titulacion->save();

            return back()->with('mensaje', 'Titulación modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido modificar la titulación');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulacion $titulacion)
    {
        //
    }
}
