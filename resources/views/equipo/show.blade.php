@extends('layouts.app')

@section('template_title')
{{ $equipo->name ?? "{{ __('Show') Equipo" }}
@endsection

@section('content')
<section>
    <div class=" mt-7">
        <div class="float-left ml-8 mt-1.5">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" href="{{ route('equipo') }}">{{ __('Volver al listado') }}</a>
        </div>
        <div class="card-body mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mx-auto block text-center">Ficha de integrante del grupo</h1>
        </div>


        <div class="card-body flex">
            <div class="w-1/2 p-4 border-r">
                <div class="form-group mx-auto">
                    @if($equipo->photo)
                    <img src="{{ asset($equipo->photo) }}" alt="Imagen" style="width: 300px; height: 300px;" class="mx-auto">
                    @endif
                </div>
            </div>

            <div class="w-1/2 p-4 flex items-center bg-white">
                <table class="table mx-auto">
                    <tr>
                        <th>Nombre:</th>
                        <td>{{ $equipo->name }}</td>
                    </tr>
                    <tr>
                        <th>Apellido:</th>
                        <td>{{ $equipo->lastName}}</td>
                    </tr>
                    <tr>
                        <th>Cargo:</th>
                        <td>{{ $equipo->position }}</td>
                    </tr>

                </table>
            </div>
        </div>
</section>
@endsection
