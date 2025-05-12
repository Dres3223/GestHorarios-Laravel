
@extends('template.main')
@section('title', 'Horario')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <h1 class="text-center">LABORES</h1>
                            @if (session("correcto"))
                                <div class="alert alert-success">{{session("correcto")}}</div>
                            @endif
                            @if (session("error"))
                                <div class="alert alert-danger">{{session("error")}}</div>
                            @endif
                            <script>
                                var res=function() {
                                    var not=confirm("Estas seguro de eliminar?");
                                    return not;
                                }
                            </script>
                            <div class="container p-2">
                                <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR LABOR</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('labores.crear')}}" method="post">
                                            @csrf
                                                <fieldset>
                                                    <div class="mb-3">
                                                        <label for="nombre_categoria" class="form-label">CODIGO</label>
                                                        <input required name="txtcodigo"type="text" id="nombre_categoria" class="form-control" placeholder="Nombre de categoria">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nombre_categoria" class="form-label">NOMBRE</label>
                                                        <input required name="txtnombre"type="text" id="nombre_categoria" class="form-control" placeholder="Nombre de categoria">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledSelect" class="form-label">TIPO DE LABOR</label>
                                                        <select name="txttipo"required id="disabledSelect" class="form-select">
                                                            <option selected disabled value="">Selecciona un tipo</option>
                                                            <option value="docente">DOCENTE</option>
                                                            <option value="docente">ADMINISTRATIVO</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                <button data-bs-toggle="modal" data-bs-target="#modalCrear"class="btn btn-success ">Crear labor</button>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">CODIGO</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">TIPO</th>
                                            <th scope="col">FUNCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($labores as $labor)
                                        <tr>
                                            <td>{{$labor->id}}</td>
                                            <td>{{$labor->codigo}}</td>
                                            <td>{{$labor->nombre}}</td>
                                            <td>{{$labor->tipo_labor}}</td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#modalEditar{{$labor->id}}"class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a onclick="return res()"href="{{route('labores.eliminar',$labor->id)}}"class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalEditar{{$labor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR LABOR</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('labores.actualizar')}}" method="post">
                                                        @csrf
                                                            <fieldset>
                                                                <div class="mb-3">
                                                                <input name="txtid"value="{{$labor->id}}"type="hidden">
                                                                    <label for="disabledTextInput" class="form-label">CODIGO</label>
                                                                    <input required name="txtcodigo"value="{{$labor->codigo}}"type="text" id="disabledTextInput" class="form-control" placeholder="Nombre de categoria">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput" class="form-label">NOMBRE</label>
                                                                    <input required name="txtnombre"value="{{$labor->nombre}}"type="text" id="disabledTextInput" class="form-control" placeholder="Nombre de categoria">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledSelect" class="form-label">TIPO</label>
                                                                    <select required name="txttipo" id="disabledSelect" class="form-select" disable>
                                                                        <option value="{{$labor->tipo_labor}}" selected>{{$labor->tipo_labor}}</option>
                                                                        <option value="DOCENTE">DOCENTE</option>
                                                                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
