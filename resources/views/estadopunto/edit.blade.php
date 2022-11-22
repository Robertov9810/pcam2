@extends('layouts.app')

@section('template_title')
    Actualizar Estado de punto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Estado de punto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estadopuntos.update', $estadopunto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estadopunto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection