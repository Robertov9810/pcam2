<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proceso') }}
            {{ Form::text('proceso', $tipoproceso->proceso, ['class' => 'form-control' . ($errors->has('proceso') ? ' is-invalid' : ''), 'placeholder' => 'proceso']) }}
            {!! $errors->first('proceso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>