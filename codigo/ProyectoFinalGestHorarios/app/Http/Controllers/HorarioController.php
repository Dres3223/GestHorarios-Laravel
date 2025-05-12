<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Horario;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class HorarioController extends Controller
{
    public function mostrarHorario() {
        $docente = auth()->user()->docente;
    $horarios = Horario::with(['labor', 'docente', 'ambiente', 'periodoAcademico'])
        ->whereHas('periodoAcademico', function ($query) {
            $query->where('estado', 1); // Solo períodos académicos activos
        });
    if (!$docente) {
        // Mostrar todos los horarios si el usuario no es un docente
        $horarios = $horarios;
    } else {
        $horarios = $horarios->where('docente_id', $docente->id);
    }
    $horarios = $horarios->get(); // Ejecutar la consulta aquí

    $dias = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
    $horariosPorDiaYHora = [];

    foreach ($dias as $dia) {
        $horariosPorDiaYHora[$dia] = [];

        foreach ($horarios as $horario) {
            if ($horario->dia == $dia) {
                $horaInicio = intval($horario->hora_inicio);
                $horaFin = intval($horario->hora_fin);

                for ($hora = $horaInicio; $hora <= $horaFin; $hora++) {
                    $horariosPorDiaYHora[$dia][$hora] = $horario;
                }
            }
        }
    }

    return view('horario.verHorario', compact('horariosPorDiaYHora'));
    }
    
    public function index()
    {
        //
        
        $horarios = \App\Models\Horario::all();
        $docentes = \App\Models\Docente::all();
        $labores = \App\Models\Labor::all();
        $ambientes = \App\Models\Ambiente::all();
        $pAcademicos = \App\Models\PeriodosAcademico::all();
        return view("horario.horarios",["horarios"=>$horarios,"docentes"=>$docentes,"labores"=>$labores,"ambientes"=>$ambientes,"pAcademicos"=>$pAcademicos]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $horario = new Horario();
            $horario->dia = $request->txtdia;
            $horario->hora_inicio = $request->txtinicio;
            $horario->hora_fin = $request->txtfin;
            $horario->periodo_academico_id = $request->txtperiodo;
            $horario->docente_id = $request->txtdocente;
            $horario->ambiente_id = $request->txtambiente;
            $horario->labor_id = $request->txtlabor;

            $horario->save();

        

            return back()->with("correcto", "Horaio registrado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar el horario");
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
            $horario = Horario::find($request->txtid);
            if ($horario) {
                $horario->dia = $request->txtdia;
                $horario->hora_inicio = $request->txtinicio;
                $horario->hora_fin = $request->txtfin;
                $horario->periodo_academico_id = $request->txtperiodo;
                $horario->docente_id = $request->txtdocente;
                $horario->ambiente_id = $request->txtambiente;
                $horario->labor_id = $request->txtlabor;
                
                $horario->save();
                return back()->with("correcto", "Horario actualizado correctamente");
            } else {
                return back()->with("error", "No se encontró el horario para actualizar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al actualizar la información del horario" . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $horario = Horario::find($id);
            if ($horario) {
                $horario->delete();
                return back()->with("correcto", "Horario eliminado correctamente");
            } else {
                return back()->with("error", "No se encontró el horario para eliminar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el horario");
        }
    }
    public function filtrarHorario(Request $request)
{
    $periodoAcademicoId = $request->input('periodo_academico_id');
    $docente = auth()->user()->docente;
    $horarios = Horario::with(['labor', 'docente', 'ambiente'])
        ->where('periodo_academico_id', $periodoAcademicoId);
    if ($docente) {
        $horarios = $horarios->where('docente_id', $docente->id);
    }
    $horarios = $horarios->get();

    $horariosPorDiaYHora = [];

    foreach (['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'] as $dia) {
        $horariosPorDiaYHora[$dia] = [];

        foreach ($horarios as $horario) {
            if ($horario->dia == $dia) {
                $horaInicio = intval($horario->hora_inicio);
                $horaFin = intval($horario->hora_fin);

                for ($hora = $horaInicio; $hora <= $horaFin; $hora++) {
                    $horariosPorDiaYHora[$dia][$hora] = $horario;
                }
            }
        }
    }

    return view('horario.verHorario', compact('horariosPorDiaYHora'));
}
public function filtrarHorarioPorDocente(Request $request)
{
    $docenteId = $request->input('docente_id');
    $periodoAcademicoId = $request->input('periodo_academico_id');

    $horarios = Horario::with(['labor', 'docente', 'ambiente'])
        ->where('docente_id', $docenteId)
        ->where('periodo_academico_id', $periodoAcademicoId);

    $horarios = $horarios->get();

    $horariosPorDiaYHora = [];

    foreach (['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'] as $dia) {
        $horariosPorDiaYHora[$dia] = [];

        foreach ($horarios as $horario) {
            if ($horario->dia == $dia) {
                $horaInicio = intval($horario->hora_inicio);
                $horaFin = intval($horario->hora_fin);

                for ($hora = $horaInicio; $hora <= $horaFin; $hora++) {
                    $horariosPorDiaYHora[$dia][$hora] = $horario;
                }
            }
        }
    }

    return view('horario.verHorario', compact('horariosPorDiaYHora'));
}
}