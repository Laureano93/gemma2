<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
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
            'id_usuario' => 'required',
            'id_inventario' => 'required',
            'fecha_prevista_devolucion' => 'required',
            'importe_fianza' => 'required',
            'concepto_fianza' => 'required',
            'observaciones' => 'required',
        ]);

        try{
            $prestamo = new Prestamo();
            $prestamo->id_usuario = $request->id_usuario;
            $prestamo->id_inventario = $request->id_inventario;
            $prestamo->fecha_prevista_devolucion = $request->fecha_prevista_devolucion;
            $prestamo->importe_fianza = $request->importe_fianza;
            $prestamo->concepto_fianza = $request->concepto_fianza;
            $prestamo->observaciones = $request->observaciones;
            $prestamo->fecha_creacion = now()->getTimestamp();
            $prestamo->fecha_modificacion = now()->getTimestamp();
            $prestamo->save();

            return back()->with('mensaje', 'Préstamo creado');
        }catch(\Exception $ex){
            return back()->with('error', 'El préstamo no ha podido crearse');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
