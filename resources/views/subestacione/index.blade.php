@extends('layouts.app')

@section('css')
<link rel="stylesheet" href= "https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" >
@endsection

@section('template_title')
    Subestacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Subestaciones') }}
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
          <h5 class="modal-title" id="exampleModalLabel">Introduzca la nueva subestacion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save5']) !!}
                <div class="mb-3">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de la subestación', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('siglas', 'Siglas') !!}
                    {!! Form::text('siglas', '', ['class' => 'form-control', 'placeholder' => 'Introduce las siglas', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('voltaje', 'Voltaje') !!}
                    {!! Form::number('voltaje', '', ['class' => 'form-control', 'placeholder' => 'Introduce el voltaje', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('enlace', 'Enlace') !!}
                    {!! Form::number('enlace', '', ['class' => 'form-control', 'placeholder' => 'Enlace', 'required']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Zona: </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="zona_id" id="inputzona_id" class="form-control">
                         <option value="" >-- Seleccione la zona --</option>
                         @foreach ($zonas as $zona)               
                         <option value="{{ $zona['id'] }}">{{ $zona['nombre']}}</option>
                         @endforeach               
                     </select>          
                </div>
                <div class="mb-3">
                <label for=""> Gerencia: </label>
                 <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                 <select name="gerencia_id" id="inputgerencia_id" class="form-control">
                     <option value="" >-- Seleccione la gerencia --</option>
                     @foreach ($gerencias as $gerencia)               
                     <option value="{{ $gerencia['id'] }}">{{ $gerencia['acronimo']}}</option>
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
                            <table class="table table-bordered border-dark">
                                <thead class="thead"  style="text-align:center; font-size:10pt;">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>Siglas</th>
                                        <th>Voltaje</th>
										<th>Enlace</th>
										<th>Zona </th>
										<th>Gerencia</th>
                                        <th>Acciones</th>      
                                    </tr>
                                </thead>
                                <tbody style="font-size:10pt;">
                                    @foreach ($subestaciones as $subestacione)
                                        <tr>
                                            <td><center>{{ ++$i }}</td>
											<td>{{ $subestacione->nombre }}</td>
											<td><center>{{ $subestacione->siglas }}</center></td>
                                            <td><center>{{$subestacione->voltaje}}</center></td>
											<td><center>{{ $subestacione->enlace }}</center></td>
											<td><center>{{ $subestacione->zona->nombre }}</center></td>
											<td><center>{{ $subestacione->gerencia->acronimo }}</center></td>
                                            <td>
                                                <form action="{{ route('subestaciones.destroy',$subestacione->id) }}" method="POST">
                                                <!--<center><a class="btn btn-sm btn-primary " href="{ { route('subestaciones.show',$subestacione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>-->
                                                    <center><a class="btn btn-sm btn-success" href="{{ route('subestaciones.edit',$subestacione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                
                <!--<nav aria-label="Page navigation example">
                <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="/subestaciones?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="/subestaciones?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="/subestaciones?page=3">3</a></li>
                <li class="page-item"><a class="page-link" href="/subestaciones?page=4">4</a></li>
                <li class="page-item"><a class="page-link" href="/subestaciones?page=5">5</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav>-->
            </div>
        </div>
    </div>
    @section('js')
    <script src= https://code.jquery.com/jquery-3.5.1.js></script>
    <script src= https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js></script>
    <script src= https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js></script>
    <script>
       $(document).ready(function () {
   $('#gerencias').DataTable({
       "lengthMenu": [[10, 50, -1], [10,50, "All"]]
   });
       } );

    </script>
   
    @endsection

@endsection
