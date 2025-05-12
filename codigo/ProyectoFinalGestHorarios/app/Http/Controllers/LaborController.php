<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    public function index()
    {
        //
        $labores = \App\Models\Labor::all();
        return view("labor.labores",["labores"=>$labores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $labor = new Labor();
            $labor->codigo = $request->txtcodigo;
            $labor->nombre = $request->txtnombre;
            $labor->tipo_labor = $request->txttipo;
            $labor->save();
            return back()->with("correcto", "Labor registrada correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar la labor");
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
            $labor = Labor::find($request->txtid);
            if ($labor) {
                $labor->codigo = $request->txtcodigo;
                $labor->nombre = $request->txtnombre;
                $labor->tipo_labor = $request->txttipo;
                $labor->save();
                return back()->with("correcto", "Labor actualizada correctamente");
            } else {
                return back()->with("error", "No se encontró la labor para actualizar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al actualizar la información de la labor");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $labor = Labor::find($id);
            if ($labor) {
                $labor->delete();
                return back()->with("correcto", "Labor eliminada correctamente");
            } else {
                return back()->with("error", "No se encontró la categoría para eliminar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar la labor");
        }
    }
}