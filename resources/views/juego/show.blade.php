@extends('layouts.app')

@section('template_title')
    {{ $juego->name ?? "{{ __('Show') Juego" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Juego</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('juegos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $juego->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Consola:</strong>
                            {{ $juego->consola->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $juego->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
