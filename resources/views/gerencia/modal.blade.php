<!-- Add Modal -->
<?php
use App\Models\Tipoproceso;
$tipoprocesos = tipoproceso::all();
?>
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Agregar nueva gerencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'save']) !!}
                <div class="mb-3">
                    {!! Form::label('nombre', 'nombre') !!}
                    {!! Form::text('nombre', '', ['class' => 'form-control', 'placeholder' => 'Introduce el nombre de la gerencia', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('siglas', 'siglas') !!}
                    {!! Form::text('siglas', '', ['class' => 'form-control', 'placeholder' => 'Introduce las siglas', 'required']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('acronimo', 'acronimo') !!}
                    {!! Form::text('acronimo', '', ['class' => 'form-control', 'placeholder' => 'Introduce el acronimo', 'required']) !!}
                </div>
                <div class="mb-3">
                    <label for=""> Proceso </label>
                     <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
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