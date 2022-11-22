@extends('layouts.app')

@section('template_title')
    {{ $tipopunto->name ?? 'Show Tipopunto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Tipo de punto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipopuntos.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo de punto:</strong>
                            {{ $tipopunto->tipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
