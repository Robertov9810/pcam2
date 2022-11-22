<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $zona->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('siglas') }}
            {{ Form::text('siglas', $zona->siglas, ['class' => 'form-control' . ($errors->has('siglas') ? ' is-invalid' : ''), 'placeholder' => 'Siglas']) }}
            {!! $errors->first('siglas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $zona->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
   
        <div class="form-group">
            {{ Form::label('Gerencia') }}
            <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
            <select name="gerencia_id" id="inputGerencia_id" class="form-control" aria-placeholder="HOLA">
                <option value="" >-- Seleccione la gerencia --</option>
                @foreach ($gerencias as $gerencia)               
                <option value="{{ $gerencia['id'] }}">{{ $gerencia['acronimo']}}</option>
                @endforeach               
            </select>

    </div><br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>

            <a class="btn btn-primary" href="{{ route('zonas.index') }}"> Atrás</a>
            
        
    </div>
</div>