@extends('layouts.app')

@section('template_title')
    {{ $estadopunto->name ?? 'Show Estadopunto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Estado de punto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estadopuntos.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $estadopunto->nom }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
