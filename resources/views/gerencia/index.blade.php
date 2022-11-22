@extends('layouts.app')

@section('template_title')
    Gerencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                           
                            
                            
                            <span id="card_title">
                                {{ __('Gerencia') }}
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
          <h5 class="modal-title" id="exampleModalLabel">Introduzca la nueva gerencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save1']) !!}
                <div class="mb-3">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de la gerencia', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('siglas', 'Siglas') !!}
                    {!! Form::text('siglas', '', ['class' => 'form-control', 'placeholder' => 'Introduce las siglas', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('acronimo', 'Acrónimo') !!}
                    {!! Form::text('acronimo', '', ['class' => 'form-control', 'placeholder' => 'Introduce el acronimo', 'required']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Proceso </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="tipoproceso_id" id="inputtipoproceso_id" class="form-control">
                         <option value="" >-- Seleccione el proceso --</option>
                         @foreach ($tipoprocesos as $tipoproceso)               
                         <option value="{{ $tipoproceso['id'] }}">{{ $tipoproceso['proceso']}}</option>
                         @endforeach               
                     </select>
                          
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
                            <table id="gerencias" class="table table-bordered border-dark" style="width:100%" >
                                <thead class="thead" style="text-align:center; font-size:10pt; font-weight:bold" >
                                    <tr>
                                        <th>No.</th>
										<th>Nombre</th>
										<th>Siglas</th>
										<th>Acrónimo</th>
										<th>Tipo proceso </th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style=" font-size:10pt">
                                    @foreach ($gerencias as $gerencia)
                                        <tr>
                                        <td><center>{{ ++$i}}</center></td>
                                    
											<td>{{ $gerencia->nombre }}</td>
											<td><center>{{ $gerencia->siglas }}</center></td>
											<td><center>{{ $gerencia->acronimo }}</center></td>
                                            <td><center>{{$gerencia->tipoprocesos->proceso}}</center></td>
                                            
                                            

                                            <td>
                                                <form action="{{ route('gerencias.destroy',$gerencia->id) }}" method="POST">
                                                    <center> <a class="btn btn-sm btn-primary " href="{{ route('gerencias.show',$gerencia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gerencias.edit',$gerencia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $gerencias->links() !!}
            </div>
        </div>
    </div>
    

   
    
@endsection
