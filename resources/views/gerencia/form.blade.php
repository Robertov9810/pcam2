<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombre', $gerencia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Siglas') }}
            {{ Form::text('siglas', $gerencia->siglas, ['class' => 'form-control' . ($errors->has('siglas') ? ' is-invalid' : ''), 'placeholder' => 'Siglas']) }}
            {!! $errors->first('siglas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Acronimo') }}
            {{ Form::text('acronimo', $gerencia->acronimo, ['class' => 'form-control' . ($errors->has('acronimo') ? ' is-invalid' : ''), 'placeholder' => 'Acronimo']) }}
            {!! $errors->first('acronimo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
           <label for=""> Proceso </label>
            <!-- selec name = (asignar el nombre a la variable de entrada) id=in-->
            <select name="tipoproceso_id" id="inputtipoproceso_id" class="form-control">
                <option value="" >-- Seleccione el proceso --</option>
                @foreach ($tipoprocesos as $tipoproceso)               
                <option value="{{ $tipoproceso['id'] }}">{{ $tipoproceso['proceso']}}</option>
                @endforeach               
            </select>    

    </div> <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ route('gerencias.index') }}"> Atrás</a>
        
    </div>
</div>