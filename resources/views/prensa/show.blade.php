@extends('layouts.app')

@section('template_title')
    {{ $prensa->name ?? __("Show Prensa") }}
@endsection

@section('content')
    <section">
    <div class="mt-7">
                <div class="float-left ml-8 ">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" href="{{ route('prensa') }}">{{ __('Volver al listado') }}</a>
                </div>
                <div class="card-body mb-10">
                    <h1 class="text-3xl font-bold text-gray-800 mx-auto block text-center">Ficha de artículo de prensa</h1>
        </div>

        <div class="card-body flex">
            <div class="w-1/2 p-4 border-r">
                <div class="form-group mx-auto">
                    @if($prensa->photo)
                        <img src="{{ asset($prensa->photo) }}" alt="Imagen" style="width: 300px; height: 300px;" class="mx-auto">
                    @endif
                </div>
            </div>
            <div class="w-1/2 p-4 flex items-center bg-white">
                <table class="table mx-auto">
                    <tr>
                        <th>Título:</th>
                        <td>{{ $prensa->title }}</td>
                    </tr>
                    <tr>
                        <th>Fecha:</th>
                        <td>{{ $prensa->date ? \Carbon\Carbon::parse($prensa->date)->format('d-m-Y') : "" }}</td>
                    </tr>
                    <tr>
                        <th>Url:</th>
                        <td>{{ $prensa->URL }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection





