@extends('layouts.app')

@section('template_title')
    Catalogo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" >
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('CATALOGO DE SUBESTACIONES') }}
                            </span>
                            
                            <!--Modal editar-->

                            @foreach($catalogos as $catalogo)
                            <div class="modal fade" id="edit{{$catalogo->id}}" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Editar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($catalogos, [ 'method' => 'patch', 'route' => ['catalogo.update', $catalogo->id] ]) !!}
            <div class="mb-3">
                <label for=""> Zona </label>
                 <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                 <select name="zona_id" id="inputzona_id" class="form-control">
                     <option value="{{$catalogo->zona->id}}" > {{ $catalogo->zona->nombre }} </option>
                     @foreach ($zonas as $zona)               
                     <option value="{{ $zona['id'] }}">{{ $zona['nombre']}}</option>
                     @endforeach               
                 </select>       
                </div>   
                <div class="mb-3">
                    <label for=""> Subestación </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="subestacion_id" id="inputsubestacion_id" class="form-control">
                         <option value="{{$catalogo->subestacione->id}}" > {{ $catalogo->subestacione->nombre }}  </option>
                         @foreach ($subestaciones as $subestacione)               
                         <option value="{{ $subestacione['id'] }}">{{ $subestacione['nombre']}}</option>
                         @endforeach               
                     </select>       
                    </div>
                <div class="mb-3">
                    {!! Form::label('siglas', 'Siglas') !!}
                    {!! Form::text('siglas', $catalogo->siglas, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('voltaje', 'Voltaje') !!}
                    {!! Form::text('voltaje', $catalogo->voltaje, ['class' => 'form-control']) !!} 
                </div>
                <div class="mb-3">
                    {!! Form::label('estatus', 'Estatus') !!}
                    {!! Form::number('estatus', $catalogo->estatus, ['class' => 'form-control']) !!} 
                </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                {{Form::button('<i class="fa fa-check-square-o"></i> Guardar', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                {!! Form::close() !!}
            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- -->
                             <div class="float-right">

                                               <!-- Button trigger modal crear-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Crear 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Introduzca los datos: </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save3']) !!}
            <div class="mb-3">
                <label for=""> Zona </label>
                 <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                 <select name="zona_id" id="inputzona_id" class="form-control">
                     <option value="" >-- Seleccione la zona --</option>
                     @foreach ($zonas as $zona)               
                     <option value="{{ $zona['id'] }}">{{ $zona['nombre']}}</option>
                     @endforeach               
                 </select>       
                </div>   
                <div class="mb-3">
                    <label for=""> Subestación </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="subestacion_id" id="inputsubestacion_id" class="form-control">
                         <option value="" >-- Seleccione la subestacion --</option>
                         @foreach ($subestaciones as $subestacione)               
                         <option value="{{ $subestacione['id'] }}">{{ $subestacione['nombre']}}</option>
                         @endforeach               
                     </select>       
                    </div>
                <div class="mb-3">
                    {!! Form::label('siglas', 'Siglas') !!}
                    {!! Form::text('siglas', '', ['class' => 'form-control', 'placeholder' => 'Introduce las siglas', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('voltaje', 'Voltaje') !!}
                    {!! Form::text('voltaje', '', ['class' => 'form-control', 'placeholder' => 'Introduce el voltaje', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('estatus', 'Estatus') !!}
                    {!! Form::number('estatus', '', ['class' => 'form-control', 'placeholder' => 'Introduce el estatus', 'required']) !!}
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
                                <thead class="thead" style="text-align:center; font-size:10pt; font-weight:bold" >
                                    <tr> 
										<th>Zona</th>
										<th>Subestación</th>
										<th>Nom</th>
										<th>Voltaje</th>
                                        <th>% Pts Estandarizados</th>
                                        <th>% Pts Cargados</th>
                                        <th>% Pts Mapeados</th>
                                        <th>Estado</th>
                                        <th>Enl</th>
                                        <th>% Pts Validados</th>
                                        <th>% Pts Val Campo</th>
                                        <th>% Ctrls Validados</th>
                                        <th>Pts Ana</th>
                                        <th>Pts Dig</th>
                                        <th>Ctls</th>
                                        <th>Pse</th>
                                        <th>TP</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:center; font-size:10pt;"">
                                    @foreach ($catalogos as $catalogo)
                                        <tr>
											<td>{{ $catalogo->zona->nombre }}</td>
											<td>{{ $catalogo->subestacione->nombre }}</td>
											<td>{{ $catalogo->siglas }}</td>
											<td>{{ $catalogo->voltaje }}</td>
                                            <td>{{ '107/107 (100.0%)'}}</td>
                                            <td>{{ '98/107 (91.6%)' }}</td>
                                            <td>{{ '98/107 (91.6%)' }}</td>
											<td id="resp{{ $catalogo->id }}">
                                                <br>
                                                @if($catalogo->estatus == 1)
                                                <button type="button" class="btn btn-sm btn-success">Si</button>
                                                @else
                                                <button type="button" class="btn btn-sm btn-danger">No</button>
                                                @endif
                                            </td>
                                            <td>
                                                <br>
                                                <label class="form-check">
                                                    <input data-id="{{ $catalogo->id }}" class="mi_checkbox" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on
                                                    ="Active" data-off="InActive" {{ $catalogo->estatus ? 'checked' : ''}}>   
                                                </label>
                                            </td>
                                            <td>{{ '98/107 (91.6%)' }}</td>
                                            <td>{{ '38/107 (35.5%)' }}</td>
                                            <td>{{ '12/30 (40.0%)' }}</td>
                                            <td>{{ '0' }}</td>
                                            <td>{{ '107' }}</td>
                                            <td>{{ '30' }}</td>
                                            <td>{{ '0' }}</td>
                                            <td>{{ '107' }}</td>
                                            <td>
                                                <form action="{{ route('catalogos.destroy',$catalogo->id) }}" method="POST">
                                                 <!-- PENDIENTE PARA ELIMINAR   <a class="btn btn-sm btn-primary " href="{{ route('catalogos.show',$catalogo->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>-->
                                                    <a href="#edit{{$catalogo->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i> Editar</a>                           
                                                    @csrf
                                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" i class="fa fa-fw fa-trash"data-bs-toggle="modal" data-bs-target="#exampleModal1"> Eliminar </button>
  
<!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de eliminar?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" > No</button>
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal" ></i> Sí,eliminar</button>
      </div>
    </div>
  </div>
</div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $catalogos->links() !!}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   
    <div class="cargando">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>
    
    <script>
    $( document ).ready(function() {
		// Llamando ready() con esta funcion hace que se ejecute todo el codigo antes de volver a cargar
	});
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).load(function() {
                $(".cargando").fadeOut(1000);
            }); 
            
        $('.mi_checkbox').change(function() {
            //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
            var estatus = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            console.log(estatus);
            
            $.ajax({
                method: "GET",
                dataType: "json",
                //url: '/StatusEnlace',
                url: '{{ route('UpdateStatusEnlace') }}',
                data: {'estatus': estatus, 'id' : id}, 
                success: function(data){
                    $('#resp' + id).html(data.var);  
                    console.log(data.var)  
                                   
                }                
            });           
        })        
    });   
        </script>
@endsection
