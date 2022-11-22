@extends('layouts.app')

@section('template_title')
    Crear Tipo de punto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tipo de punto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipopuntos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipopunto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
