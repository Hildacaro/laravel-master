@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Prensa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="mt-7">
                <div class="float-left ml-8 mt-1">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" href="{{ route('prensa') }}">{{ __('Volver al listado') }}</a>
                </div>
                <div class="card-body pb-10">
                    <h1 class="text-3xl font-bold text-gray-800 mx-auto block text-center mb-4">Modificar datos del artículo de prensa</h1>

                        <form method="POST" action="{{ route('prensa.update', $prensa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('prensa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
