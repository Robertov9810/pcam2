@extends('layouts.app')

@section('template_title')
    Estadopunto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estado de punto') }}
                            </span>
                            <div class="float-right">
  <!-- Button trigger modal CREAR -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Crear 
  </button>
  <br>
  <br> 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Introduzca el Estado de Punto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save9']) !!}
                <div class="mb-3">
                    {!! Form::label('nom', 'Estado de Punto') !!}
                    {!! Form::text('nom', '', ['class' => 'form-control', 'placeholder' => 'Introduce el estado de punto', 'required']) !!}
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
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark">
                                <thead class="thead" style="text-align:center; font-size:10pt; font-weight:bold" >
                                    <tr>
                                        <th>No</th>
										<th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style=" font-size:10pt;">
                                    @foreach ($estadopuntos as $estadopunto)
                                        <tr>
                                            <td><center>{{ ++$i }}</center></td>
											<td>{{ $estadopunto->nom }}</td>

                                            <td>
                                                <form action="{{ route('estadopuntos.destroy',$estadopunto->id) }}" method="POST">
                                                  <center>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estadopuntos.edit',$estadopunto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button></center>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estadopuntos->links() !!}
            </div>
        </div>
    </div>
@endsection
