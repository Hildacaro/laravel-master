@extends('layouts.app')

@section('template_title')
    {{ $pregunta->name ?? "{{ __('Show') Pregunta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pregunta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pregunta') }}"> {{ __('Volver al listado') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Question:</strong>
                            {{ $pregunta->question }}
                        </div>
                        <div class="form-group">
                            <strong>Answer:</strong>
                            {{ $pregunta->answer }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
