<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('leyenda') }}
            {{ Form::text('leyenda', $punto->leyenda, ['class' => 'form-control' . ($errors->has('leyenda') ? ' is-invalid' : ''), 'placeholder' => 'Leyenda']) }}
            {!! $errors->first('leyenda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entity_name') }}
            {{ Form::text('entity_name', $punto->entity_name, ['class' => 'form-control' . ($errors->has('entity_name') ? ' is-invalid' : ''), 'placeholder' => 'Entity Name']) }}
            {!! $errors->first('entity_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bin_in') }}
            {{ Form::text('bin_in', $punto->bin_in, ['class' => 'form-control' . ($errors->has('bin_in') ? ' is-invalid' : ''), 'placeholder' => 'Bin In']) }}
            {!! $errors->first('bin_in', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bin_out') }}
            {{ Form::text('bin_out', $punto->bin_out, ['class' => 'form-control' . ($errors->has('bin_out') ? ' is-invalid' : ''), 'placeholder' => 'Bin Out']) }}
            {!! $errors->first('bin_out', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estatus') }}
            {{ Form::text('estatus', $punto->estatus, ['class' => 'form-control' . ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'estatus operacion']) }}
            {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}    
        </div>
        <div class="form-group">
            <label for=""> Comentario </label>
             <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
             <select name="comentario_id" id="inputComentario_id" class="form-control">
                 <option value="" >-- Seleccione el comentario--</option>
                 @foreach ($comentarios as $comentario)               
                 <option value="{{ $comentario['id'] }}">{{ $comentario['texto']}}</option>
                 @endforeach               
             </select>    
     </div>
        <div class="form-group">
            {{ Form::label('control_validado') }}
            {{ Form::text('control_validado', $punto->estadopunto_id, ['class' => 'form-control' . ($errors->has('control_validado') ? ' is-invalid' : ''), 'placeholder' => 'Control validado']) }}
            {!! $errors->first('control_validado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadopunto_id') }}
            <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
            <select name="estadopunto_id" id="inputEstadopunto_id" class="form-control">
                <option value="" >-- Seleccione el estado del punto --</option>
                @foreach ($estadopuntos as $estadopuntos)               
                <option value="{{ $estadopuntos['id'] }}">{{ $estadopuntos['nom']}}</option>
                @endforeach            
            </select>
        </div>
            <div class="form-group">
                {{ Form::label('subestacion_id') }}
                <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
                <select name="subestacion_id" id="inputSubestacion_id" class="form-control">
                    <option value="" >-- Seleccione la subestacion --</option>
                    @foreach ($subestaciones as $subestacione)               
                    <option value="{{ $subestacione['id'] }}">{{ $subestacione['siglas']}}</option>
                    @endforeach            
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('tipopunto_id') }}
                <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
                <select name="tipopunto_id" id="inputTipopunto_id" class="form-control">
                    <option value="" >-- Seleccione el tipo de punto --</option>
                    @foreach ($tipopuntos as $tipopunto)               
                    <option value="{{ $tipopunto['id'] }}">{{ $tipopunto['tipo']}}</option>
                    @endforeach            
                    </select>
                </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>