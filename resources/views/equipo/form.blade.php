<div class="flex items-center justify-center mt-4">
    <div class="bg-white shadow-xl border rounded" style="width: 80%; padding: 52px 70px">

        <div class="form-group mb-4">
            {{ Form::label('name', 'Nombre', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('name', $equipo->name, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('title') ? ' border-red-500' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('lastName', 'Apellido', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('lastName', $equipo->lastName, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('title') ? ' border-red-500' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('lastName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('position', 'Cargo', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('position', $equipo->position, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('URL') ? ' border-red-500' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('photo', 'Foto', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}

            @if($equipo->photo)
                <img src="{{ asset($equipo->photo) }}" alt="Imagen" style="width: 200px; height: 150px;" class="mx-auto mb-4">
            @endif

            {{ Form::file('photo', ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('photo') ? ' border-red-500' : '')]) }}
            {!! $errors->first('photo', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>

        <div class="float-right">
            <div class="mb-4">
                {{ Form::submit(__('Enviar'), ['class' => 'btn-blue text-white font-bold py-2 px-4 rounded']) }}
            </div>
        </div>
</div>
