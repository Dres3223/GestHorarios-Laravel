<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index()
    {
        //
        $ambientes = \App\Models\Ambiente::all();
        return view("ambiente.ambientes",["ambientes"=>$ambientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $ambiente = new Ambiente();
            $ambiente->codigo = $request->txtcodigo;
            $ambiente->nombre = $request->txtnombre;
            $ambiente->tipo = $request->txttipo;
            $ambiente->capacidad_estudiantes = $request->txtcapacidad;
            $ambiente->ubicacion = $request->txtubicacion;

            $ambiente->save();
            return back()->with("correcto", "ambiente registrado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar la ambiente");
        }
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            $ambiente = Ambiente::find($request->txtid);
            if ($ambiente) {
                $ambiente->codigo = $request->txtcodigo;
                $ambiente->nombre = $request->txtnombre;
                $ambiente->tipo = $request->txttipo;
                $ambiente->capacidad_estudiantes = $request->txtcapacidad;
                $ambiente->ubicacion = $request->txtubicacion;
                $ambiente->estado = $request->txtestado;
                $ambiente->save();
                return back()->with("correcto", "ambiente actualizada correctamente");
            } else {
                return back()->with("error", "No se encontró la ambiente para actualizar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al actualizar la información de la ambiente");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $ambiente = Ambiente::find($id);
            if ($ambiente) {
                $ambiente->delete();
                return back()->with("correcto", "ambiente eliminado correctamente");
            } else {
                return back()->with("error", "No se encontró el ambiente para eliminar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar la ambiente");
        }
    }
}