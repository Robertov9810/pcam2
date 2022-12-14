@extends('layouts.app')

@section('template_title')
    {{ $gerencia->name ?? 'Show Gerencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Gerencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gerencias.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gerencia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Siglas:</strong>
                            {{ $gerencia->siglas }}
                        </div>
                        <div class="form-group">
                            <strong>Acronimo:</strong>
                            {{ $gerencia->acronimo }}
                        </div>
                        <div class="form-group">
                            <strong>Proceso:</strong>
                            {{ $gerencia->tipoproceso_id }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
