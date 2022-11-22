<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $subestacione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('siglas') }}
            {{ Form::text('siglas', $subestacione->siglas, ['class' => 'form-control' . ($errors->has('siglas') ? ' is-invalid' : ''), 'placeholder' => 'Siglas']) }}
            {!! $errors->first('siglas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('voltaje') }}
            {{ Form::text('voltaje', $subestacione->voltaje, ['class' => 'form-control' . ($errors->has('voltaje') ? ' is-invalid' : ''), 'placeholder' => 'Voltaje']) }}
            {!! $errors->first('voltaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('enlace') }}
            {{ Form::text('enlace', $subestacione->enlace, ['class' => 'form-control' . ($errors->has('enlace') ? ' is-invalid' : ''), 'placeholder' => 'Enlace']) }}
            {!! $errors->first('enlace', '<div class="invalid-feedback">:message</div>') !!}
        </div>
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
            {{ Form::label('Gerencia') }}
            <select name="gerencia_id" id="inpuGerencia_id" class="form-control">
                <option value="" >-- Seleccione la gerencia --</option>
                @foreach ($gerencias as $gerencia)               
                <option value="{{ $gerencia['id'] }}">{{ $gerencia['acronimo']}}</option>
                @endforeach               
            </select>

    </div><br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-primary" href="{{ route('subestaciones.index') }}"> Atrás</a>
    </div>
</div>