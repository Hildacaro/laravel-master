@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Beneficiario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="mt-7">
                <div class="float-left ml-8 ">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" href="{{ route('beneficiario') }}">{{ __('Volver al listado') }}</a>
                </div>
                <div class="card-body mb-10">
                    <h1 class="text-3xl font-bold text-gray-800 mx-auto block text-center mb-4">Nuevo Registro de Beneficiario</h1>
                            <form method="POST" action="{{ route('beneficiario.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('beneficiario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
