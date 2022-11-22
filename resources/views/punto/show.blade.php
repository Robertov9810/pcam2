@extends('layouts.app')

@section('template_title')
    {{ $punto->name ?? 'Show Punto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Punto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puntos.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Leyenda:</strong>
                            {{ $punto->leyenda }}
                        </div>
                        <div class="form-group">
                            <strong>Entity Name:</strong>
                            {{ $punto->entity_name }}
                        </div>
                        <div class="form-group">
                            <strong>Bin In:</strong>
                            {{ $punto->bin_in }}
                        </div>
                        <div class="form-group">
                            <strong>Bin Out:</strong>
                            {{ $punto->bin_out }}
                        </div>
                        <div class="form-group">
                            <strong>Requerido Op:</strong>
                            {{ $punto->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Cambio:</strong>
                            {{ $punto->updated_at }}
                        </div>
                        <div class="form-group">
                            <strong>Subestacion:</strong>
                            {{ $punto->subestacione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de punto:</strong>
                            {{ $punto->tipopunto->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Estado del punto:</strong>
                            {{ $punto->estadopunto->nom }}
                        </div>
                        <div class="form-group">
                            <strong>Estado del punto:</strong>
                            {{ $punto->comentario->texto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
