@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Equipo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="card-body">
                    <div class="float-left ml-2 mt-3">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" href="{{ route('equipo') }}">{{ __('Volver al listado') }}</a>
                    </div>
                        <h1 class="text-3xl font-bold text-gray-800 mx-auto block text-center mb-4 mt-3">Nuevo integrante del equipo</h1>
                        <form method="POST" action="{{ route('equipo.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('equipo.form')

                        </form>
                </div>
            </div>
        </div>
    </section>
@endsection
