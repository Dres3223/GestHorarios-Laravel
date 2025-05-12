<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeriodosAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class PeriodosAcademicosController extends Controller
{
    public function index()
    {
        //
        $pAcademicos = \App\Models\PeriodosAcademico::all();
        return view("periodoAcademico.pAcademicos",["pAcademicos"=>$pAcademicos ]);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $pAcademico = new PeriodosAcademico();
            $pAcademico->nombre = $request->txtnombre;
            $pAcademico->fecha_inicio = $request->txtinicio;
            $pAcademico->fecha_fin = $request->txtfin;
            $pAcademico->save();
            return back()->with("correcto", "Periodo Academico registrada correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar el Periodo Academico");
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
            $pAcademico = PeriodosAcademico::find($request->txtid);
            if ($pAcademico) {
                $pAcademico->nombre = $request->txtnombre;
                $pAcademico->fecha_inicio = $request->txtinicio;
                $pAcademico->fecha_fin = $request->txtfin;
                $pAcademico->estado = $request->txtestado;
                $pAcademico->save();
                return back()->with("correcto", "Periodo Academico actualizada correctamente");
            } else {
                return back()->with("error", "No se encontró el Periodo Academico para actualizar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al actualizar la información de el Periodo Academico");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $pAcademico = PeriodosAcademico::find($id);
            if ($pAcademico) {
                $pAcademico->delete();
                return back()->with("correcto", "periodo Academico eliminada correctamente");
            } else {
                return back()->with("error", "No se encontró la Periodo Acadenico  para eliminar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el Periodo Academico");
        }
    }
}