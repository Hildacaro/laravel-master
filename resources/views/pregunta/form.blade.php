<div class="flex items-center justify-center mt-4">
    <div class="bg-white shadow-xl border rounded" style="width: 80%; padding: 52px 70px">


        <div class="form-group mb-4">
            {{ Form::label('question', 'Pregunta', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
            {{ Form::textArea('question', $pregunta->question, ['class' => 'form-control appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline'  . ($errors->has('question') ? ' is-invalid' : ''), 'placeholder' => 'Pregunta']) }}
            {!! $errors->first('question', '<div class="invalid-feedback text-red-500 text-xs italic">La pregunta es requerido</div>') !!}
        </div>
        <div class="form-group mb-4">
            {{ Form::label('answer', 'Respuesta', ['class' => 'block text-gray-700 text-sm font-bold mb-2'])}}
            {{ Form::textArea('answer', $pregunta->answer, ['class' => 'form-control appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline'  .  ($errors->has('answer') ? ' is-invalid' : ''), 'placeholder' => 'Respuesta']) }}
            {!! $errors->first('answer', '<div class="invalid-feedback  text-red-500 text-xs italic">La respuesta es requerida</div>') !!}
        </div>

        <div class="float-right">
            <div class="mb-4">
                {{ Form::submit(__('Enviar'), ['class' => 'btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
            </div>
        </div>

    </div>
</div>
