@extends('template.main')
@section('title', 'Horario')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1 class="text-center">USUARIOS</h1>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR USUARIO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body register-card-body">
                                    <form class="needs-validation" novalidate action="/register" method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nombre Completo" value="{{ old('name') }}" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Correo" value="{{ old('email') }}" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Contraseña" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="passwordConfirm" id="passwordConfirm"
                                                class="form-control @error('passwordConfirm') is-invalid @enderror"
                                                placeholder="Repite la Contraseña" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('passwordConfirm')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.form-box -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <button data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-success ">Crear usuario</button>

            @endrole
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE COMPLETO</th>
                        <th scope="col">CORREO</th>
                        @role('coordinador')
                        <th scope="col">FUNCION</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id_user}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        @role('coordinador')
                        <td>

                            <a onclick="return res()" href="{{route('usuario.eliminar',$usuario->id_user)}}"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        @endrole
                        <!-- Modal -->

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