@extends('layouts.app')

@section('template_title')
    {{ $tipoproceso->name ?? 'Show Tipoproceso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipoproceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipoprocesos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proceso:</strong>
                            {{ $tipoproceso->proceso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
