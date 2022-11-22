@extends('layouts.app')

@section('template_title')
    Punto
@endsection

@section('content')
    
<head>
    
  <link rel="stylesheet" type="text/css" href="{{ asset('css/maquinawrite.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cssGeneral.css') }} ">
  <script> 
    function abrirModalComentario(id){
    //alert("Hola" + id);
    $("#verModalToggle").modal('show');
    ComentarioNuevo(id);
  }                
    function ComentarioNuevo(id){
    var ComentarioNew = new Object();
    ComentarioNew = id;
    var mijson = JSON.stringify(ComentarioNew);  
    alert("HELLO" + id);-
    alert("Hola mundo" + mijson);    
    }
    $.ajax({
    method: "GET",
    dataType: "json",
    //url: '/StatusPunto',
    url: '{{ route('ComentarioAgregado') }}',
    data: {'punto_id': punto_id, 'id' : id}, 
    success: function(data){
    $("comen" + id).html(data.var);  
    console.log(data.var)                               
    }
    });                                          
    </script>
</head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('SUBESTACION:') }}
                            </span>
                            <!-- Modal ver comentario y egregar -->
                            <!-- Primer modal con el target= verModalToggle, que es para mostrar todos los comentarios existentes del punto -->
                            <div class="modal fade" id="verModalToggle" aria-hidden="true" aria-labelledby="verModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="verModalToggleLabel">TODOS LOS COMENTARIOS</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Cuerpo del primer modal -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                           @foreach( $puntos as $punto)   
                                           {{$punto->comentario}}

                                           @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- El boton #Agregar nos arroja el segundo modal con el target= agregarModalToggle2 --> 
                                      <button class="btn btn-primary" data-bs-target="#agregarModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Agregar+</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- -->
                              <!-- Segundo modal con el target= agregarModalToggle2 -->
                              <div class="modal fade" id="agregarModalToggle2" aria-hidden="true" aria-labelledby="agregarModalToggleLabel2" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="agregarModalToggleLabel2">Introduce el comentario</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['url' => 'save10']) !!}
                                        <div class="mb-3">
                                            {!! Form::label('Comentario:', 'Comentario:') !!}
                                            {!! Form::text('texto', '', ['class' => 'form-control', 'placeholder' => 'Introduce el comentario', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Agregar</button>
                                        {!! Form::close() !!}
                                        <!-- Boton volver para regresar al modal principal, ya que no pueden
                                        estar dos modals abiertos al mismo timpo, este tiene el target=#verModalToggle ya que hace referencia al target
                                        del primer modal-->
                                        <button class="btn btn-primary" data-bs-target="#verModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            <!-- Modal editar-->

                            @foreach($puntos as $punto)
                            <div class="modal fade" id="edit{{$punto->id}}" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Editar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($puntos, [ 'method' => 'patch', 'route' => ['punto.update', $punto->id] ]) !!}
            
                <div class="mb-3">
                    {!! Form::label('leyenda', 'leyenda') !!}
                    {!! Form::text('leyenda', $punto->leyenda, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('entity_name', 'entity_name') !!}
                    {!! Form::text('entity_name', $punto->entity_name, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bin_in', 'bin_in') !!}
                    {!! Form::number('bin_in', $punto->bin_in, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bin_out', 'bin_out') !!}
                    {!! Form::number('bin_out', $punto->bin_out, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('estatus', 'estatus') !!}
                    {!! Form::number('estatus', $punto->estatus, ['class' => 'form-control']) !!}
                </div>                                  
                <div class="mb-3">
                    {!! Form::label('texto', 'texto') !!}
                    {!! Form::text('texto', $punto->texto, ['class' => 'form-control']) !!}
                </div>   
                <div class="mb-3">
                    {!! Form::label('control_validado', 'control_validado') !!}
                    {!! Form::number('control_validado', $punto->control_validado, ['class' => 'form-control']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Estado del punto: </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="estadopunto_id" id="inputestadopunto_id" class="form-control">
                         <option value="{{$punto->estadopunto->id}}" > {{ $punto->estadopunto->nom }}  </option>
                         @foreach ($estadopuntos as $estadopunto)               
                         <option value="{{ $estadopunto['id'] }}">{{ $estadopunto['nom']}}</option>
                         @endforeach               
                     </select>    
                </div>
                <div class="mb-3">
                    <label for=""> Subestacion </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="subestacion_id" id="inputsubestacion_id" class="form-control">
                         <option value="{{$punto->subestacione->id}}" > {{ $punto->subestacione->nombre }}  </option>
                         @foreach ($subestaciones as $subestacione)               
                         <option value="{{ $subestacione['id'] }}">{{ $subestacione['nombre']}}</option>
                         @endforeach               
                     </select>
                </div>
                     <div class="mb-3">
                    <label for=""> Tipo de punto: </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="tipopunto_id" id="inputtipopunto_id" class="form-control">
                         <option value="{{$punto->tipopunto->id}}" > {{ $punto->tipopunto->tipo }}  </option>
                         @foreach ($tipopuntos as $tipopunto)               
                         <option value="{{ $tipopunto['id'] }}">{{ $tipopunto['tipo']}}</option>
                         @endforeach               
                     </select>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        {{Form::button('<i class="fa fa-check-square-o"></i> Actualizar', ['class' => 'btn btn-success', 'type' => 'submit'])}}
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
          <h5 class="modal-title" id="exampleModalLabel">Introduzca el nuevo punto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::open(['url' => 'save7']) !!}
                <div class="mb-3">
                    {!! Form::label('leyenda', 'Leyenda') !!}
                    {!! Form::text('leyenda', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre del punto', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('entity_name', 'Entity_name') !!}
                    {!! Form::text('entity_name', '', ['class' => 'form-control', 'placeholder' => 'Introduce el entity_name', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bin_in', 'Bin_in') !!}
                    {!! Form::number('bin_in', '', ['class' => 'form-control', 'placeholder' => 'Introduce bin_in', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('bin_out', 'Bin_out') !!}
                    {!! Form::number('bin_out', '', ['class' => 'form-control', 'placeholder' => 'Introduce bin_out', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('estatus', 'Estatus') !!}
                    {!! Form::number('estatus', '', ['class' => 'form-control', 'placeholder' => 'Requerido Operación', 'required']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Estado del punto: </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="estadopunto_id" id="inputestadopunto_id" class="form-control">
                         <option value="" >-- Seleccione el estado del punto --</option>
                         @foreach ($estadopuntos as $estadopunto)               
                         <option value="{{ $estadopunto['id'] }}">{{ $estadopunto['nom']}}</option>
                         @endforeach               
                     </select>          
                </div>
                <div class="mb-3">
                    {!! Form::label('Comentario:', 'Comentario') !!}
                    {!! Form::text('comentario', '', ['class' => 'form-control', 'placeholder' => 'Escriba el comentario', 'required']) !!}
                </div>
                 <div class="mb-3">
                    {!! Form::label('control_validado', 'Control_validado') !!}
                    {!! Form::number('control_validado', '', ['class' => 'form-control', 'placeholder' => 'control_validado', 'required']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Subestación: </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                     <select name="subestacion_id" id="inputsubestacion_id" class="form-control">
                         <option value="" >-- Seleccione la subestación --</option>
                         @foreach ($subestaciones as $subestacione)               
                         <option value="{{ $subestacione['id'] }}">{{ $subestacione['nombre']}}</option>
                         @endforeach               
                     </select>          
                     </div>
                     <div class="mb-3">
                        <label for=""> Tipo de punto: </label>
                         <!-- selec name = (asignar el nombre a la variable de entrada) id=in, el nombre de la variable ser-->
                         <select name="tipopunto_id" id="inputsubestacion_id" class="form-control">
                             <option value="" >-- Seleccione el tipo de punto --</option>
                             @foreach ($tipopuntos as $tipopunto)               
                             <option value="{{ $tipopunto['id'] }}">{{ $tipopunto['tipo']}}</option>
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
                                <thead class="thead" style="text-align:center; font-size:10pt; font-weight:bold" >
                                    <tr>
                                        <th>No.</th>
										<th>Leyenda</th>
										<th>Entity Name</th>
										<th>Bin In</th>
										<th>Bin Out</th>
                                        <th>Estado</th>
										<th>Requerido Operación</th>
                                        <th>Estado del punto</th>
                                        <th>Estado</th>
                                        <th>Control validado</th>
                                        <th>Comentario</th>
										<th>Fecha ultimo cambio</th>
										<th>Subestacion</th>
										<th>Tipo de punto</th>										
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:center; font-size:10pt;">
                                    @foreach ($puntos as $id=>$punto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $punto->leyenda }}</td>
											<td>{{ $punto->entity_name }}</td>
											<td>{{ $punto->bin_in }}</td>
											<td>{{ $punto->bin_out }}</td>
                                            <td id="resp{{ $punto->id }}">
                                                <br>
                                                @if($punto->estatus == 1)
                                                <button type="button" class="btn btn-sm btn-success">Si</button>
                                                @else
                                                <button type="button" class="btn btn-sm btn-danger">No</button>
                                                @endif
                                            </td>
                                            <td>
                                                <br>
                                                <label class="form-check">
                                                    <input data-id="{{ $punto->id }}" class="mi_checkbox" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on
                                                    ="Active" data-off="InActive" {{ $punto->estatus ? 'checked' : ''}}>
                                                    
                                                </label>
                                            </td>
                                            <td>{{ $punto->estadopunto->nom }}</td>
										    <!--CONTROL VALIDADO-->
                                            <td id="resp2{{ $punto->id }}">
                                                <br>
                                                @if($punto->control_validado == 1)
                                                <button type="button" class="btn btn-sm btn-success">Si</button>
                                                @else
                                                <button type="button" class="btn btn-sm btn-danger">No</button>
                                                @endif
                                            </td>
                                            <td>
                                                <br>
                                                <label class="form-check">
                                                    <input data-id="{{ $punto->id }}" class="mi_checkbox2" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on
                                                    ="Active" data-off="InActive" {{ $punto->control_validado ? 'checked' : ''}}>                                                    
                                                </label>                 
                                            <!--<td><center><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verModalToggle">
                                                Ver más...
                                              </button>-->
                                              <td><center><br><button onclick="abrirModalComentario({{$punto->id}});" class="btn btn-primary">
                                                Ver más...
                                              </button>
                                               
                                              <!--<a class="btn btn-link" href="data-bs-toggle=modal data-bs-target='#verModal'">
                                                { {__('Ver más') }}
                                              </a>-->
                                              <!--{ { $punto->comentario->texto }}--></center></td>
											<td>{{ $punto->updated_at }}</td>
                                            <td>{{ $punto->subestacione->nombre }}</td>
                                            <td>{{ $punto->tipopunto->tipo }}</td>																					
                                            <td>
                                                <form action="{{ route('puntos.destroy',$punto->id) }}" method="POST">
                                                    <center>  <a class="btn btn-sm btn-primary " href="{{ route('puntos.show',$punto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a href="#edit{{$punto->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i> Editar</a>                           
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
                {!! $puntos->links() !!}
            </div>
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
    $( document ).ready(function() 
    {
		//Llamando ready() con esta funcion hace que se ejecute todo el codigo antes de volver a cargar
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

            /**var mipunto = new Object();
            mipunto.estatus = estatus;
            mipunto.id  = id;
            mipunto.o = new Object;
            mipunto.o.nombre = "Perla";
            mipunto.o.descripcion = "residentecontida";
            
            var mijson = JSON.stringify(mipunto);
            alert(mijson);*/ 

            $.ajax({
                method: "GET",
                dataType: "json",
                //url: '/StatusPunto',
                url: '{{ route('UpdateStatusPunto') }}',
                data: {'estatus': estatus, 'id' : id}, 
                success: function(data){
                    $('#resp' + id).html(data.var);  
                    console.log(data.var)                                     
                }                
            });           
        })        
    });   
    //CONTROL VALIDADO javascript
        </script>

<script type="text/javascript">
      
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        }); 
        
    $('.mi_checkbox2').change(function() {
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var control_validado = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        console.log(control_validado);

        $.ajax({
            method: "GET",
            dataType: "json",
            //url: '/StatusPunto',
            url: '{{ route('UpdateStatusValidado') }}',
            data: {'control_validado': control_validado, 'id' : id}, 
            success: function(data){
                $('#resp2' + id).html(data.var);
                console.log(data.var)                   
            }                
        });           
    })        
});   
    </script>
    
@endsection
