@extends('layouts.app')

@section('template_title')
    {{ $catalogo->name ?? 'Show Catalogo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Catalogo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catalogos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Zona Id:</strong>
                            {{ $catalogo->zona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subestacion Id:</strong>
                            {{ $catalogo->subestacion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Siglas:</strong>
                            {{ $catalogo->siglas }}
                        </div>
                        <div class="form-group">
                            <strong>Voltaje:</strong>
                            {{ $catalogo->voltaje }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $catalogo->estatus }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
