@extends('layouts.app')

@section('template_title')
    {{ $zona->name ?? 'Show Zona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar zona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('zonas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $zona->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Siglas:</strong>
                            {{ $zona->siglas }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $zona->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Gerencia Id:</strong>
                            {{ $zona->gerencia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
