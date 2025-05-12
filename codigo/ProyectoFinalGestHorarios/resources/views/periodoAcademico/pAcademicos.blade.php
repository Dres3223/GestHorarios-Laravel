@extends('template.main')
@section('title', 'Horario')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1 class="text-center">PERIODOS ACADEMICOS</h1>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR PERIODO ACADEMICO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('periodosacademicos.crear')}}" method="post">
                                @csrf
                                <fieldset>
                                    <div class="mb-3">
                                        <label for="nombre_categoria" class="form-label">NOMBRE</label>
                                        <input required name="txtnombre" type="text" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_categoria" class="form-label">FECHA INICIO</label>
                                        <input required name="txtinicio" type="date" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_categoria" class="form-label">FECHA FIN</label>
                                        <input required name="txtfin" type="date" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
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
            <button data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-success ">Crear periodo
                academico</button>
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">FEHCA INICIO</th>
                        <th scope="col">FECHA FIN</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">FUNCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pAcademicos as $pAcademico)
                    <tr>
                        <td>{{$pAcademico->id}}</td>
                        <td>{{$pAcademico->nombre}}</td>
                        <td>{{$pAcademico->fecha_inicio}}</td>
                        <td>{{$pAcademico->fecha_fin}}</td>
                        <td>{{$pAcademico->estado == 1 ? 'Activo' : 'Inactivo'}}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#modalEditar{{$pAcademico->id}}"
                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return res()" href="{{route('periodosacademicos.eliminar',$pAcademico->id)}}"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modalEditar{{$pAcademico->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR PERIODO ACADEMICO
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('periodosacademicos.actualizar')}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <div class="mb-3">
                                                    <input name="txtid" value="{{$pAcademico->id}}" type="hidden">
                                                    <label for="disabledTextInput" class="form-label">NOMBRE</label>
                                                    <input required name="txtnombre" value="{{$pAcademico->nombre}}"
                                                        type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">FECHA
                                                        INICIO</label>
                                                    <input required name="txtinicio"
                                                        value="{{$pAcademico->fecha_inicio}}" type="date"
                                                        id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">FECHA FIN</label>
                                                    <input required name="txtfin" value="{{$pAcademico->fecha_fin}}"
                                                        type="date" id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">ESTADO</label>
                                                    <select required name="txtestado" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="0"
                                                            {{ $pAcademico->estado == '0' ? 'selected' : '' }}>Inactivo
                                                        </option>
                                                        <option value="1"
                                                            {{ $pAcademico->estado == '1' ? 'selected' : '' }}>Activo
                                                        </option>
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


                </tbody>
            </table>
        </div>
        @endsection