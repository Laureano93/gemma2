<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
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
            'nombre' => 'required',
            'datos' => 'required',
            
        ]);

        try{
            $inventario = new Inventario();
            $inventario->nombre = $request->nombre;
            $inventario->datos = $request->datos;
            $inventario->fecha_creacion = now()->getTimestamp();
            $inventario->fecha_modificacion = now()->getTimestamp();
            $inventario->save();
            return back()->with('mensaje', 'Inventario añadido');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido definirse el inventario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'nombre' => 'required',
            'datos' => 'required',
            
        ]);

        try{
            $inventario->nombre = $request->nombre;
            $inventario->datos = $request->datos;
            $inventario->fecha_creacion = now()->getTimestamp();
            $inventario->fecha_modificacion = now()->getTimestamp();
            $inventario->save();
            return back()->with('mensaje', 'Inventario modificado');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido modificarse el inventario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
