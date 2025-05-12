@extends('template.main')
@section('title', 'Horario')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1 class="text-center">HORARIOS</h1>
        @if (session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
        @endif
        @if (session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
        @endif
        <script>
        var res = function() {
            var not = confirm("Estas seguro de eliminar?");
            return not;
        }
        </script>
        <div class="container p-2">
            <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR HORARIO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('horarios.crear')}}" method="post">
                                @csrf
                                <fieldset>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">PERIODO ACADEMICO</label>
                                        <select name="txtperiodo" required id="disabledSelect" class="form-select">
                                            <option selected disabled value="">Selecciona periodo academico</option>
                                            @foreach ($pAcademicos as $pAcademico)
                                            @if ($pAcademico->estado ==1)
                                            <option value="{{$pAcademico->id}}">
                                                {{$pAcademico->nombre}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">DIA</label>
                                        <select name="txtdia" required id="disabledSelect" class="form-select">
                                            <option selected disabled value="">Selecciona un dia</option>
                                            <option value="lunes">LUNES</option>
                                            <option value="martes">MARTES</option>
                                            <option value="miercoles">MIERCOLES</option>
                                            <option value="jueves">JUEVES</option>
                                            <option value="viernes">VIERNES</option>
                                            <option value="sabado">SABADO</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">AMBIENTE</label>
                                        <select name="txtambiente" required id="disabledSelect" class="form-select">
                                            <option selected disabled value="">Selecciona un dia</option>
                                            @foreach ($ambientes as $ambiente)
                                            @if ($ambiente->estado==1)
                                            <option value="{{$ambiente->id}}">
                                                {{$ambiente->nombre}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_libro" class="form-label">HORA INICIO </label>
                                        <input min="07:00" max="22:00" required name="txtinicio" type="time"
                                            id="nombre_libro" class="form-control"
                                            placeholder="Ingresa nombre del autor">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_libro" class="form-label">HORA FIN </label>
                                        <input min="07:00" max="22:00" required name="txtfin" type="time"
                                            id="nombre_libro" class="form-control"
                                            placeholder="Ingresa nombre del autor">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">DOCENTE</label>
                                        <select name="txtdocente" required id="disabledSelect" class="form-select">
                                            <option selected disabled value="">Selecciona un dia</option>
                                            @foreach ($docentes as $docente)
                                            @if ($docente->estado==1)
                                            <option value="{{$docente->id}}">
                                                {{$docente->nombres.'-'.$docente->apellidos}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">LABOR</label>
                                        <select name="txtlabor" required id="disabledSelect" class="form-select">
                                            <option selected disabled value="">Selecciona labor</option>
                                            @foreach ($labores as $labor)
                                            <option value="{{$labor->id}}">
                                                {{$labor->nombre.'-'.$labor->tipo_labor}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-success ">Crear Horario</button>
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">PERIODO ACADEMICO</th>
                        <th scope="col">DIA</th>
                        <th scope="col">AMBIENTE</th>
                        <th scope="col">HORA DE INICIO</th>
                        <th scope="col">HORA FINAL</th>
                        <th scope="col">DOCENTE</th>
                        <th scope="col">LABOR</th>
                        <th scope="col">FUNCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                    <tr>
                        <td>{{$horario->id}}</td>
                        <td>{{$horario->periodoAcademico->nombre}}</td>
                        <td>{{$horario->dia}}</td>
                        <td>{{$horario->ambiente->nombre}}</td>
                        <td>{{$horario->hora_inicio}}</td>
                        <td>{{$horario->hora_fin}}</td>
                        <td>{{$horario->docente->nombres.'-'.$horario->docente->apellidos}}</td>
                        <td>{{$horario->labor->nombre.'-'.$horario->labor->tipo_labor}}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#modalEditar{{$horario->id}}"
                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return res()" href="{{route('horarios.eliminar',$horario->id)}}"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modalEditar{{$horario->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR HORARIO</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('horarios.actualizar')}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <div class="mb-3">
                                                    <input name="txtid" value="{{$horario->id}}" type="hidden">
                                                    <label for="disabledSelect" class="form-label">PERIODO
                                                        ACADEMICO</label>
                                                    <select name="txtperiodo" required id="disabledSelect"
                                                        class="form-select">
                                                        <option value="{{$horario->periodoAcademico->id}}" selected>
                                                            {{$horario->periodoAcademico->nombre}}</option>
                                                        @foreach ($pAcademicos as $pAcademico)
                                                        @if ($pAcademico->estado ==1)
                                                        <option value="{{$pAcademico->id}}">
                                                            {{$pAcademico->nombre}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">DIA</label>
                                                    <select required name="txtdia" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="{{$horario->dia}}" selected>{{$horario->dia}}
                                                        </option>
                                                        <option value="lunes">LUNES</option>
                                                        <option value="martes">MARTES</option>
                                                        <option value="miercoles">MIERCOLES</option>
                                                        <option value="jueves">JUEVES</option>
                                                        <option value="viernes">VIERNES</option>
                                                        <option value="sabado">SABADO</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">AMBIENTE</label>
                                                    <select name="txtambiente" required id="disabledSelect"
                                                        class="form-select">
                                                        <option value="{{$horario->ambiente->id}}" selected>
                                                            {{$horario->ambiente->nombre}}</option>
                                                        @foreach ($ambientes as $ambiente)
                                                        @if ($ambiente->estado ==1)
                                                        <option value="{{$ambiente->id}}">
                                                            {{$ambiente->nombre}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">HORA
                                                        INICIO</label>
                                                    <input min="07:00" max="22:00" required name="txtinicio"
                                                        value="{{$horario->hora_inicio}}" type="time"
                                                        id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">HORA FIN</label>
                                                    <input min="07:00" max="22:00" required name="txtfin"
                                                        value="{{$horario->hora_fin}}" type="time"
                                                        id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">DOCENTE</label>
                                                    <select name="txtdocente" required id="disabledSelect"
                                                        class="form-select">
                                                        <option value="{{$horario->docente->id}}" selected>
                                                            {{$horario->docente->nombres.''.$horario->docente->apellidos}}
                                                        </option>
                                                        @foreach ($docentes as $docente)
                                                        @if ($docente->estado ==1)
                                                        <option value="{{$docente->id}}">
                                                            {{$docente->nombres.'-'.$docente->apellidos}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">LABOR</label>
                                                    <select name="txtlabor" required id="disabledSelect"
                                                        class="form-select">
                                                        <option value="{{$horario->labor->id}}" selected>
                                                            {{$horario->labor->nombre.'-'.$horario->labor->tipo_labor}}
                                                        </option>
                                                        @foreach ($labores as $labor)
                                                        <option value="{{$labor->id}}">
                                                            {{$labor->nombre.'-'.$labor->tipo_labor}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>

                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/"></a></li>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection