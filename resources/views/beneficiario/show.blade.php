@extends('layouts.app')

@section('template_title')
    {{ $beneficiario->name ?? "{{ __('Show') Beneficiario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Beneficiario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('beneficiario') }}"> {{ __('Volver al Listado') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $beneficiario->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $beneficiario->lastName }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $beneficiario->DNI }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $beneficiario->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $beneficiario->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
