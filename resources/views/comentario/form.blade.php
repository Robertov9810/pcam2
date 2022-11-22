<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
        <div class="form-group">
            {{ Form::label('texto') }}
            {{ Form::text('texto', $comentario->texto, ['class' => 'form-control' . ($errors->has('texto') ? ' is-invalid' : ''), 'placeholder' => 'Texto']) }}
            {!! $errors->first('texto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>