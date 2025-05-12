@extends('template.main')
@section('title', '')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        @yield('title')</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Displaying user or docente information -->
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Información del Usuario</h3>
                        </div>
                        <div class="card-body">
                            @if(auth()->user()->docente)
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Nombres:</strong> {{ auth()->user()->docente->nombres }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Apellidos:</strong> {{ auth()->user()->docente->apellidos }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Correo Electrónico:</strong> {{ auth()->user()->docente->user->email }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Tipo de Identificación:</strong>
                                        {{ auth()->user()->docente->tipo_identificacion }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Identificación:</strong> {{ auth()->user()->docente->identificacion }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Tipo de Docente:</strong> {{ auth()->user()->docente->tipo_docente }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Tipo de Contrato:</strong> {{ auth()->user()->docente->tipo_contrato }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Área:</strong> {{ auth()->user()->docente->area }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Estado:</strong> @if(auth()->user()->docente->estado == 1) Activo @else
                                        Inactivo @endif</p>
                                </div>
                            </div>
                            @else
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p><strong>Nombre de usuario:</strong> {{ auth()->user()->name }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Correo Electrónico:</strong> {{ auth()->user()->email }}
                                    </p>
                                </div>
                            </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p>
                                        <strong>Rol</strong>:
                                        @if(auth()->user()->id_user== 1) Coordinador
                                        @else Docente
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    @endsection