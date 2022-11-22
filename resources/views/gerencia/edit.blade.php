@extends('layouts.app')

@section('template_title')
    Actualizar Gerencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Gerencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gerencias.update', $gerencia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('gerencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
