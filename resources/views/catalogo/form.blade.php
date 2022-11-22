<div class="box box-info padding-1">
    <div class="box-body">      
        <div class="form-group">
            {{ Form::label('Zona') }}
            <select name="zona_id" id="inputZona_id" class="form-control">
                <option value="" >-- Seleccione la zona --</option>
                @foreach ($zonas as $zona)               
                <option value="{{ $zona['id'] }}">{{ $zona['nombre']}}</option>
                @endforeach               
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Subestación') }}
            <select name="subestacion_id" id="inputSubestacione_id" class="form-control">
                <option value="" >-- Seleccione la Subestación --</option>
                @foreach ($subestaciones as $subestacione)               
                <option value="{{ $subestacione['id'] }}">{{ $subestacione['nombre']}}</option>
                @endforeach               
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('siglas') }}
            {{ Form::text('siglas', $catalogo->siglas, ['class' => 'form-control' . ($errors->has('siglas') ? ' is-invalid' : ''), 'placeholder' => 'Siglas']) }}
            {!! $errors->first('siglas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('voltaje') }}
            {{ Form::text('voltaje', $catalogo->voltaje, ['class' => 'form-control' . ($errors->has('voltaje') ? ' is-invalid' : ''), 'placeholder' => 'Voltaje']) }}
            {!! $errors->first('voltaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estatus') }}
            {{ Form::text('estatus', $catalogo->estatus, ['class' => 'form-control' . ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'Estatus']) }}
            {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>