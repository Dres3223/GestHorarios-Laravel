@extends('template.main')
@section('title', 'Horario')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1 class="text-center">DOCENTES</h1>
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
            @role('coordinador')
            <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR DOCENTE</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('docentes.crear')}}" method="post">
                                @csrf
                                <fieldset>
                                    <div class="mb-3">
                                        <label for="nombres" class="form-label">NOMBRES</label>
                                        <input required name="txtnombres" type="text" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellidos" class="form-label">APELLIDOS</label>
                                        <input required name="txtapellidos" type="text" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">TIPO DE IDENTIFICACION</label>
                                        <select name="txttipo_identificacion" required id="disabledSelect"
                                            class="form-select">
                                            <option selected disabled value="">Selecciona un tipo</option>
                                            <option value="CC">CEDULA DE CIUDADANIA</option>
                                            <option value="TI">TARJETA DE IDENTIFICACION</option>
                                            <option value="RC">REGISTRO CIVIL</option>
                                            <option value="CE">CEDULA DE EXTRANJERIA</option>
                                            <option value="CI">CARNET DE IDENTIDAD</option>
                                            <option value="DNI">DOCUMENTO NACIONAL DE IDENTIDAD</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_categoria" class="form-label">IDENTIFICACION</label>
                                        <input required name="txtidentificacion" type="text" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">TIPO DE DOCENTE</label>
                                        <select required name="txttipo_docente" required id="disabledSelect"
                                            class="form-select">
                                            <option selected disabled value="">Selecciona un tipo</option>
                                            <option value="PROFESIONAL">PROFESIONAL</option>
                                            <option value="ESPECIALISTA">ESPECIALISTA</option>
                                            <option value="MAGISTER">MAGISTER</option>
                                            <option value="DOCTOR">DOCTOR</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">TIPO DE CONTRATO</label>
                                        <select required name="txttipo_contrato" required id="disabledSelect"
                                            class="form-select">
                                            <option selected disabled value="">Selecciona un tipo</option>
                                            <option value="PT">PLANTA</option>
                                            <option value="OTC">OCACIONAL TIEMPO COMPLETO</option>
                                            <option value="CAT">CATEDRA</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="area" class="form-label">AREA</label>
                                        <input required name="txtarea" type="text" id="nombre_categoria"
                                            class="form-control" placeholder="Nombre de categoria">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">CORREO Y CONTRASENA</label>
                                        <select required name="txtusuario" required id="disabledSelect"
                                            class="form-select">
                                            <option disabled selected>Selecciona un correo para asignar</option>
                                            @foreach($users as $user)
                                            <option value=" {{ $user->id_user }}">{{ $user->email }}</option>
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

            <button data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-success ">Crear docente</button>

            @endrole
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">TIPO DE IDENTIFICACION</th>
                        <th scope="col">IDENTIFICACION</th>
                        <th scope="col">TIPO DE DOCENTE</th>
                        <th scope="col">TIPO DE CONTRATO</th>
                        <th scope="col">AREA</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">CORREO</th>
                        @role('coordinador')
                        <th scope="col">FUNCIONES</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                    <tr>
                        <td>{{$docente->id}}</td>
                        <td>{{$docente->nombres}}</td>
                        <td>{{$docente->apellidos}}</td>
                        <td>{{$docente->tipo_identificacion}}</td>
                        <td>{{$docente->identificacion}}</td>
                        <td>{{$docente->tipo_docente}}</td>
                        <td>{{$docente->tipo_contrato}}</td>
                        <td>{{$docente->area}}</td>
                        <td>{{$docente->estado == 1 ? 'Activo' : 'Inactivo'}}</td>
                        <td>{{$docente->user->email}}</td>
                        @role('coordinador')
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#modalEditar{{$docente->id}}"
                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return res()" href="{{route('docentes.eliminar',$docente->id)}}"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        @endrole
                        <!-- Modal -->
                        <div class="modal fade" id="modalEditar{{$docente->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR DOCENTE</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('docentes.actualizar')}}" method="post">
                                            @csrf
                                            <fieldset>
                                                <div class="mb-3">
                                                    <input name="txtid" value="{{$docente->id}}" type="hidden">
                                                    <label for="disabledTextInput" class="form-label">NOMBRES</label>
                                                    <input required name="txtnombres" value="{{$docente->nombres}}"
                                                        type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">APELLIDOS</label>
                                                    <input required name="txtapellidos" value="{{$docente->apellidos}}"
                                                        type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">TIPO DE
                                                        IDENTIFICACION</label>
                                                    <select required name="txttipo_identificacion" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="{{$docente->tipo_identificacion}}" selected>
                                                            {{$docente->tipo_identificacion}}</option>
                                                        <option value="CC">CEDULA DE CIUDADANIA</option>
                                                        <option value="TI">TARJETA DE IDENTIFICACION</option>
                                                        <option value="RC">REGISTRO CIVIL</option>
                                                        <option value="CE">CEDULA DE EXTRANJERIA</option>
                                                        <option value="CI">CARNET DE IDENTIDAD</option>
                                                        <option value="DNI">DOCUMENTO NACIONAL DE IDENTIDAD</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput"
                                                        class="form-label">IDENTIFICACION</label>
                                                    <input required name="txtidentificacion"
                                                        value="{{$docente->identificacion}}" type="text"
                                                        id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">TIPO DE
                                                        DOCENTE</label>
                                                    <select required name="txttipo_docente" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="{{$docente->tipo_docente}}" selected>
                                                            {{$docente->tipo_docente}}</option>
                                                        <option value="PROFESIONAL">PROFESIONAL</option>
                                                        <option value="ESPECIALISTA">ESPECIALISTA</option>
                                                        <option value="MAGISTER">MAGISTER</option>
                                                        <option value="DOCTOR">DOCTOR</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">TIPO DE
                                                        CONTRATO</label>
                                                    <select required name="txttipo_contrato" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="{{$docente->tipo_contrato}}" selected>
                                                            {{$docente->tipo_contrato}}</option>
                                                        <option value="PT">PLANTA</option>
                                                        <option value="OTC">OCACIONAL TIEMPO COMPLETO</option>
                                                        <option value="CAT">CATEDRA</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledTextInput" class="form-label">AREA</label>
                                                    <input required name="txtarea" value="{{$docente->area}}"
                                                        type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="Nombre de categoria">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">ESTADO</label>
                                                    <select required name="txtestado" id="disabledSelect"
                                                        class="form-select" disable>
                                                        <option value="0"
                                                            {{ $docente->estado == '0' ? 'selected' : '' }}>Inactivo
                                                        </option>
                                                        <option value="1"
                                                            {{ $docente->estado == '1' ? 'selected' : '' }}>Activo
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
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection