@extends('layouts.app')

@section('template_title')
    Comentario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Comentario') }}
                            </span>

                             <div class="float-right">
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Crear 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Introduzca comentarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save6']) !!}
                <div class="mb-3">
                    {!! Form::label('texto', 'texto') !!}
                    {!! Form::text('texto', '', ['class' => 'form-control', 'placeholder' => 'Introduce el comentario', 'required']) !!}
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                {!! Form::close() !!}
            </div>
      </div>
    </div>
  </div>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark">
                                <thead class="thead" style="text-align:center; font-size:10pt;">
                                    <tr>
                                        <th>No</th>                                        										
										<th>Texto</th>
                                        <th>Fecha cambio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style=" font-size:10pt;">
                                    @foreach ($comentarios as $comentario)
                                        <tr>
                                            <td><center>{{ ++$i }}<center></td>
                                            <td>{{ $comentario->texto }}</td>
											<td><center>{{ $comentario->updated_at }}<center></td>
											

                                            <td>
                                                <form action="{{ route('comentarios.destroy',$comentario->id) }}" method="POST">
                                                    <center> <a class="btn btn-sm btn-primary " href="{{ route('comentarios.show',$comentario->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('comentarios.edit',$comentario->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button><center>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $comentarios->links() !!}
            </div>
        </div>
    </div>
@endsection
