@extends('template.main')
@section('title', 'Horario')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <form action="{{route("filtrarHorario")}}" method="GET" class="mb-3">
            <div class="input-group">
                <select name="periodo_academico_id" class="form-control">
                    <option disable selected>Selecciona Periodo Academico</option>
                    @foreach($pAcademicos as $pAcademico)
                    <option value="{{ $pAcademico->id }}">{{ $pAcademico->nombre }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
        @role('coordinador')
        <form action="{{route("filtrarHorarioPorDocente")}}" method="GET" class="mb-3">
            <div class="input-group">
                <select required name="docente_id" class="form-control">
                    <option disable selected>Selecciona Docente</option>
                    @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->nombres.' '.$docente->apellidos }}</option>
                    @endforeach
                </select>
                <select required name="periodo_academico_id" class="form-control">
                    <option disable selected>Selecciona Periodo Academico De Docente</option>
                    @foreach($pAcademicos as $pAcademico)
                    <option value="{{ $pAcademico->id }}">{{ $pAcademico->nombre }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
        @endrole
        <h1 class="text-center">HORARIOS</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sábado</th>
                </tr>
            </thead>
            <tbody>
                @for ($hour = 7; $hour <= 22; $hour++) <tr>
                    <td>
                        {{ $hour }}:00
                    </td>
                    @foreach (['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'] as $day)
                    @if (isset($horariosPorDiaYHora[$day][$hour]))
                    @php
                    $horario = $horariosPorDiaYHora[$day][$hour];
                    $horaInicio = intval($horario->hora_inicio);
                    $horaFin = intval($horario->hora_fin);
                    $rowspan = $horaFin - $horaInicio + 1;
                    @endphp
                    @if ($hour == $horaInicio)
                    <td rowspan="{{ $rowspan }}" class="bg-primary text-white">
                        <strong>LABOR:</strong> {{ $horario->labor->nombre.'--'.$horario->labor->tipo_labor }}<br>
                        <strong>HORA INICIO:</strong> {{ $horario->hora_inicio}}<br>
                        <strong>HORA FIN</strong> {{ $horario->hora_fin }}<br>
                        <strong>DOCENTE:</strong> {{ $horario->docente->nombres.'--'.$horario->docente->apellidos }}<br>
                        <strong>AMBIENTE:</strong> {{ $horario->ambiente->nombre }}<br>
                    </td>
                    @endif
                    @elseif (!isset($horariosPorDiaYHora[$day][$hour - 1]) || !isset($horariosPorDiaYHora[$day][$hour])
                    && $hour != 7)
                    <td></td>
                    @endif
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection