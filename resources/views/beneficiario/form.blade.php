<div class="flex items-center justify-center h-full">
    <div class="bg-white shadow-xl border rounded" style="width: 80%; padding: 52px 70px;">

        <div class="form-group mb-4 ">
            {{ Form::label('name', 'Nombre', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('name', $beneficiario->name, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('name') ? ' border-red-500' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4 ">
            {{ Form::label('lastName', 'Apellido', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('lastName', $beneficiario->lastName, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('lastName') ? ' border-red-500' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('lastname', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4 ">
            {{ Form::label('DNI', 'DNI', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('DNI', $beneficiario->DNI, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('DNI') ? ' border-red-500' : ''), 'placeholder' => 'DNI']) }}
            {!! $errors->first('DNI', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4 ">
            {{ Form::label('email', 'Correo', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('email', $beneficiario->email, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('email') ? ' border-red-500' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('email', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4 ">
            {{ Form::label('phone', 'Teléfono', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('phone', $beneficiario->phone, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('phone') ? ' border-red-500' : ''), 'placeholder' => 'Teléfono']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>

        <div class="float-right">
            <div class="mb-4">
                {{ Form::submit(__('Enviar'), ['class' => 'btn-blue text-white font-bold py-2 px-4 rounded']) }}
            </div>
        </div>

    </div>
</div>

