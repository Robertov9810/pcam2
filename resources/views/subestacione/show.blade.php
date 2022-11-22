@extends('layouts.app')

@section('template_title')
    {{ $subestacione->name ?? 'Show Subestacione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Subestacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('subestaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $subestacione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Siglas:</strong>
                            {{ $subestacione->siglas }}
                        </div>
                        <div class="form-group">
                            <strong>Enlace:</strong>
                            {{ $subestacione->enlace }}
                        </div>
                        <div class="form-group">
                            <strong>Zona Id:</strong>
                            {{ $subestacione->zona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Gerencia Id:</strong>
                            {{ $subestacione->gerencia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
