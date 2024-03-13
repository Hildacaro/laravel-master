<div class="flex items-center justify-center mt-4">
    <div class="bg-white shadow-xl border rounded" style="width: 80%; padding: 52px 70px">

        <div class="form-group mb-4">
            {{ Form::label('title', 'Titulo', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('title', $prensa->title, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('title') ? ' border-red-500' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('title', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('date', 'Fecha', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('date', $prensa->date ? $prensa->date->format('d-m-Y') : "", ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('date') ? ' border-red-500' : ''), 'placeholder' => 'Fecha DD-MM-YYYY']) }}
            {!! $errors->first('date', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('URL', 'URL', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::text('URL', $prensa->URL, ['class' => 'form-input appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline' . ($errors->has('URL') ? ' border-red-500' : ''), 'placeholder' => 'URL']) }}
            {!! $errors->first('URL', '<div class="invalid-feedback text-red-500 text-xs italic">:message</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('photo', 'Imagen', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}

            @if($prensa->photo)
                <img src="{{ asset($prensa->photo) }}" alt="Imagen" style="width: 200px; height: 150px;" class="mx-auto mb-2">
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
</div>

